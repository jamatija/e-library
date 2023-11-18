<?php

namespace App\Http\Controllers;

use App\Traits\Imageable;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreAuthorRequest;
use App\Http\Requests\UpdateAuthorRequest;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends BaseController
{
    // Trait for handling images
    use Imageable;

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Sort, filter and paginate data
        $items = $this->processIndexData($request, Author::query());
        $resultsCount = $this->resultsCount;

        return view('cruds.authors.index', compact('items', 'resultsCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cruds.authors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAuthorRequest $request)
    {
        // Validates form data
        $inputs = $request->validated();

        // Create author with validated data
        $author = Author::create($inputs);

        // Save uploaded profile picture
        $author->saveProfilePicture(Author::STORAGE_FOLDER_NAME, $request);

        // After the operation is finished redirects back
        return redirect()->route('authors.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        return view('cruds.authors.show', compact('author'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
        return view('cruds.authors.edit', compact('author'));
    }

    /**
     * Update the specfied resource in storage.
     */
    public function update(UpdateAuthorRequest $request, Author $author)
    {
        // Validate form data
        $inputs = $request->validated();

        // Update author with new validated data
        $author->update($inputs);

        // Update profile picture
        $author->saveProfilePicture(Author::STORAGE_FOLDER_NAME, $request);

        // After the operation is finished redirects back
        return redirect()->route('authors.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        // Delete author image from storage
        Storage::disk('public')->delete($author->profilePicture);

        // Delete author images from Images table
        $author->images()->delete();

        // Delete row in author_book pivot table
        $author->books()->detach();

        // Delete author from table Authors
        $author->delete();

        // After the operation is finished redirects back
        return redirect()->route('authors.index');
    }

    /**
     * Delete all selected rows.
     */
    public function bulkDelete(Request $request)
    {
        // From string make array of IDs
        $selectedIds = explode(',', $request->input('selected_ids'));

        // Delete all authors with selected IDs
        Author::whereIn('id', $selectedIds)->delete();

        return redirect()->route('authors.index');
    }

    /**
     * Filters data for index page.
     */
    protected function filter($query, $searchTerm)
    {
        if (!empty($searchTerm)) {
            $query->where('name', 'LIKE', "%$searchTerm%");
            $query->orWhere('about', 'LIKE', "%$searchTerm%");
        }
    }

}
