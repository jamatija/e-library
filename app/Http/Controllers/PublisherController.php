<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePublisherRequest;
use App\Http\Requests\UpdatePublisherRequest;
use App\Models\Publisher;
use Illuminate\Http\Request;

class PublisherController extends BaseController
{ /**
  * Display a listing of the resource.
  */
    public function index(Request $request)
    {
        // Order, filter and paginate data
        $items = $this->processIndexData($request, Publisher::query());
        $resultsCount = $this->resultsCount;

        return view('cruds.settings.publishers.index', compact('items', 'resultsCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Shows a page for creating a new publisher
        return view('cruds.settings.publishers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePublisherRequest $request)
    {
        // Stores new publisher in DB with the validated fields from StorePublisherRequest
        Publisher::create($request->validated());

        // After the operation is finished redirects to a different page
        return redirect()->route('publishers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Publisher $publisher)
    {
        // We do not use show method since there is not much to show (only a name)
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Publisher $publisher)
    {
        // Shows a page for editing the publisher
        return view('cruds.settings.publishers.edit', compact('publisher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePublisherRequest $request, Publisher $publisher)
    {
        // Updates publisher fields with the validated parameters from UpdatePublisherRequest
        $publisher->update($request->validated());

        // After the operation is finished redirects to a different page
        return redirect()->route('publishers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Publisher $publisher, Request $request)
    {
        // Deletes publisher from the DB
        $publisher->delete();

        // After the operation is finished redirects back
        return redirect()->back();
    }
}
