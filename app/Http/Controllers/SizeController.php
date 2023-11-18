<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSizeRequest;
use App\Http\Requests\UpdateSizeRequest;
use App\Models\Size;
use Illuminate\Http\Request;


class SizeController extends BaseController
{ /**
  * Display a listing of the resource.
  */
    public function index(Request $request)
    {
        // Order, filter and paginate data
        $items = $this->processIndexData($request, Size::query());
        $resultsCount = $this->resultsCount;

        return view('cruds.settings.sizes.index', compact('items', 'resultsCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cruds.settings.sizes.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Size $size)
    {
        // We do not use show method since there is not much to show (only a name)
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSizeRequest $request)
    {
        Size::create($request->validated());
        return redirect()->route('sizes.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Size $size)
    {
        return view('cruds.settings.sizes.edit', compact('size'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSizeRequest $request, Size $size)
    {
        $size->update($request->validated());
        return redirect()->route('sizes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Size $size, Request $request)
    {
        // Deletes genre from the DB
        $size->delete();

        // After the operation is finished redirects back
        return redirect()->back();
    }
}
