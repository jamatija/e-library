<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreScriptRequest;
use App\Http\Requests\UpdateScriptRequest;
use App\Models\Script;
use Illuminate\Http\Request;


class ScriptController extends BaseController
{ /**
  * Display a listing of the resource.
  */
    public function index(Request $request)
    {
        // Order, filter and paginate data
        $items = $this->processIndexData($request, Script::query());
        $resultsCount = $this->resultsCount;

        return view('cruds.settings.scripts.index', compact('items', 'resultsCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cruds.settings.scripts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreScriptRequest $request)
    {
        Script::create($request->validated());
        return redirect()->route('scripts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Script $script)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Script $script)
    {
        return view('cruds.settings.scripts.edit', compact('script'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateScriptRequest $request, Script $script)
    {
        $script->update($request->validated());
        return redirect()->route('scripts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Script $script, Request $request)
    {
        // Deletes genre from the DB
        $script->delete();

        // After the operation is finished redirects back
        return redirect()->back();
    }
}
