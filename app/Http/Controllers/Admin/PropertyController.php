<?php

namespace App\Http\Controllers\Admin;

use App\Models\Option;
use App\Models\Property;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\admin\PropertyFormRequest;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $property = Property::all();
        // dd($property);
        return view("admin.properties.index",['properties' => Property::orderByDesc('created_at')->paginate(1)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $property = new Property();
        $property->fill([
            'surface'=>40,
            'rooms'=>3,
            'bedrooms'=>1,
            'floor'=>0,
            'city'=>'Doula',
            'postal_code'=>35000,
            'sold'=>false,
        ]);
        // dd(new Property());

        // dd(Option::pluck('name','id'));

        return view('admin.properties.form',['property'=> $property,'options' => Option::pluck('name','id')]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PropertyFormRequest $request)
    {
        $property = Property::create($request->validated());
        $property->option()->sync($request->validated('options'));
        return redirect()->route('admin.property.index')->with('success','Le bien a bien ete créé');

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
    public function edit(Property $property)
    {
        return view(
            'admin.properties.form',['property'=>$property,'options' => Option::pluck('name','id')]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PropertyFormRequest $request, Property $property)
    {
        $property->update($request->validated());
        $property->option()->sync($request->validated('options'));
        return to_route('admin.property.index')->with('success','Le bien a bien ete modifie');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        $property->delete();
        return to_route('admin.property.index')->with('success','Le bien a bien ete supprimer');
    }
}
