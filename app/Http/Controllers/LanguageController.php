<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLanguageRequest;
use App\Http\Requests\UpdateLanguageRequest;
use App\Models\Language;
use Illuminate\Http\Request;

class LanguageController extends BaseController
{ /**
  * Display a listing of the resource.
  */
    public function index(Request $request)
    {
        // Order, filter and paginate data
        $items = $this->processIndexData($request, Language::query());
        $resultsCount = $this->resultsCount;

        return view('cruds.settings.languages.index', compact('items', 'resultsCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Shows a page for creating a new language
        return view('cruds.settings.languages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLanguageRequest $request)
    {
        // Stores new language in DB with the validated fields from StoreLanguageRequest
        Language::create($request->validated());

        // After the operation is finished redirects to a different page
        return redirect()->route('languages.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Language $language)
    {
        // We do not use show method since there is not much to show (only a name)
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Language $language)
    {
        // Shows a page for editing the language
        return view('cruds.settings.languages.edit', compact('language'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLanguageRequest $request, Language $language)
    {
        // Updates language fields with the validated parameters from UpdateLanguageRequest
        $language->update($request->validated());

        // After the operation is finished redirects to a different page
        return redirect()->route('languages.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Language $language, Request $request)
    {
        // Deletes language from the DB
        $language->delete();

        // After the operation is finished redirects back
        return redirect()->back();
    }
}
