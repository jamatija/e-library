<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Author;
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
    
        if ($size && $script && $publisher && $binding) {
            $book->size()->associate($size);
            $book->script()->associate($script);
            $book->binding()->associate($binding);
            $book->publisher()->associate($publisher);
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
        //
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
        //
    }
}
