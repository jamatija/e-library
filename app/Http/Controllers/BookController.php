<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Author;
use App\Models\BookImage;
use App\Models\Book;
use App\Models\Category;
use App\Models\Genre;
use App\Models\Publisher;
use App\Models\Binding;
use App\Models\Script;
use App\Models\Size;
use Illuminate\Http\Request;

class BookController extends BaseController
{
    protected $orderBy = 'title';
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Book::with(['authors', 'genres', 'categories']);
        
        $items = $this->processIndexData($request, $query);

        return view('book.index', compact('items' ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $genres = Genre::all();
        $authors = Author::all();
        $publishers = Publisher::all();
        $bindings = Binding::all();
        $sizes = Size::all();
        $scripts = Script::all();

        return view('book.create', compact('categories', 'genres', 'authors', 'publishers', 'bindings', 'sizes', 'scripts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {
        $validatedData = $request->validated();
        $book = new Book();
        $book->fill($validatedData);
        
    
        $authorsId = explode(',', $request->input('authors'));
        $genresId = explode(',', $request->input('genres'));
        $categoriesId = explode(',', $request->input('categories'));
        
        $authors = Author::whereIn('id', $authorsId)->get();
        $genres = Genre::whereIn('id', $genresId)->get();
        $categories = Category::whereIn('id', $categoriesId)->get();
        
        $book->save();
    
        $book->authors()->sync($authors->pluck('id'));
        $book->genres()->sync($genres->pluck('id'));
        $book->categories()->sync($categories->pluck('id'));
    
        $sizeId = $request->input('size');
        $scriptId = $request->input('script');
        $publisherId = $request->input('publisher');
        $bindingId = $request->input('binding');
    
        $size = Size::find($sizeId);
        $script = Script::find($scriptId);
        $publisher = Publisher::find($publisherId);
        $binding = Binding::find($bindingId);
    
        $book->size()->associate($size);
        $book->script()->associate($script);
        $book->binding()->associate($binding);
        $book->publisher()->associate($publisher);
        
       
        $chosenProfileImage = $request->chosen_image ?? 0;

        //Ako su uploadovane slike sacuvaj, ako nisu postavi defaultnu sliku
        if($request->hasFile('image')){
        $images = $request->file('image');
        
        if(count($images) >= $chosenProfileImage){
            $profileImgPath = Storage::disk('public')->put('books/profile', $images[ $chosenProfileImage]);
            $book['picture'] = $profileImgPath;
        }
    

        $book->save();   

        foreach($images as $img){
            $path = Storage::disk('public')->put('books', $img);

            // Kreiraj novi zapis u tabeli books_image
            $bookImage = new BookImage(['path' => $path]);
            $book->images()->save($bookImage);
        }

    }else{
        //Defaultna profila slika
        $book['picture'] = Book::DEFAULT_BOOK_PICTURE_PATH;
        $book->save();   
    }
        

        return redirect()->route('books.index');
    
}
    

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        $book->load(['genres', 'authors', 'categories', 'publisher']);

        return view('book.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $categories = Category::all();
        $genres = Genre::all();
        $authors = Author::all();
        $publishers = Publisher::all();
        $bindings = Binding::all();
        $sizes = Size::all();
        $scripts = Script::all();

        return view('book.edit', compact('categories', 'genres', 'authors', 'publishers', 'bindings', 'sizes', 'scripts', 'book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //Ako nije defaultna slika obrisi je
        if(!empty($book->picture) && $book->picture != Book::DEFAULT_BOOK_PICTURE_PATH){
            Storage::delete($book->picture);
            
            $images = $book->images;

            foreach($images as $img){ 
                $path = $img->path;
                Storage::delete($path); 
            }
            //Obrisi sve slike vezane za tu knjigu
            $book->images()->delete();
        }  

        //Brisanje one to many relacije
        $book->size()->dissociate();
        $book->script()->dissociate();
        $book->binding()->dissociate();
        $book->publisher()->dissociate();


        //Brisanje many to many relacije
        $book->authors()->detach();
        $book->genres()->detach();
        $book->categories()->detach();

        $book->delete();

        return redirect()->route('books.index');
    }

    public function bookSpecifications($book){
        
        $book = Book::find($book);

        return view('book.specifications', compact('book'));
    }

    public function showBookMedia($book){
        
        $book = Book::with('images')->find($book);        
        
        return view('book.update_multimedia', compact('book'));
    }


    public function updateBookMedia(Request $request, $id){

        // $request->validate([
        //     'image' => 'required', // Bar jedna slika je obavezna
        //     'image.*' => 'mimes:jpeg,png,jpg,gif,svg|max:2048', // Svaka slika mora biti tipa image i određenih formata
        // ]);
    
        //Ako su uploadovane slike sacuvaj, ako nisu postavi defaultnu sliku
        if($request->hasFile('image')){
            $images = $request->file('image');
        
            foreach($images as $img){
                $path = Storage::disk('public')->put('books', $img);
    
                // Kreiraj novi zapis u tabeli books_image
                $bookImage = new BookImage(['path' => $path]);
                
                $bookImage->book_id = $id;
    
                $bookImage->save();
            } 
        }

        return redirect()->route('books.index');
    }


    protected function filter($query, $searchTerm)
    {
        if (!empty($searchTerm)) {
            $query->where('title', 'LIKE', "%$searchTerm%");
            $query->orWhere('isbn', 'LIKE', "%$searchTerm%");
        }
    }

 
}
