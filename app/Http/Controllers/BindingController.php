<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBindingRequest;
use App\Http\Requests\UpdateBindingRequest;
use App\Models\Binding;
use Illuminate\Http\Request;

class BindingController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Order, filter and paginate data
        $items = $this->processIndexData($request, Binding::query());
        $resultsCount = $this->resultsCount;

        return view('cruds.settings.bindings.index', compact('items', 'resultsCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Shows a page for creating a new binding
        return view('cruds.settings.bindings.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBindingRequest $request)
    {
        // Stores new binding in DB with the validated fields from StoreBindingRequest
        Binding::create($request->validated());

        // After the operation is finished redirects to a different page
        return redirect()->route('bindings.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Binding $binding)
    {
        // We do not use show method since there is not much to show (only a name)
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Binding $binding)
    {
        // Shows a page for editing the binding
        return view('cruds.settings.bindings.edit', compact('binding'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBindingRequest $request, Binding $binding)
    {
        // Updates binding fields with the validated parameters from UpdateBindingRequest
        $binding->update($request->validated());

        // After the operation is finished redirects to a different page
        return redirect()->route('bindings.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Binding $binding, Request $request)
    {
        // Deletes binding from the DB
        $binding->delete();

        // After the operation is finished redirects back
        return redirect()->back();
    }
}
