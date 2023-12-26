<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\OptionsFormRequest;
use App\Models\Option;
use Illuminate\Http\Request;

class OptionsController extends Controller
{
    public function index()
    {
        $option = Option::all();
        // dd($option);
        return view("admin.option.index",['options' => Option::paginate(2)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $option = new Option();
       
        // dd(new Option());
        return view('admin.option.form',['option'=> $option]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OptionsFormRequest $request)
    {
        Option::create($request->validated());
        return redirect()->route('admin.option.index')->with('success','L\'option a bien ete créé');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Option $option)
    {
        return view(
            'admin.option.form',['option'=>$option]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OptionsFormRequest $request, Option $option)
    {
        $option->update($request->validated());
        return to_route('admin.option.index')->with('success','L\'option a bien ete modifie');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Option $option)
    {
        $option->delete();
        return to_route('admin.option.index')->with('success','L\'option a bien ete supprimer');
    }
}
