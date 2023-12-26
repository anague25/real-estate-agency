<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use App\Mail\PropertyContactMail;
use Illuminate\Support\Facades\Mail;
use function PHPUnit\Framework\isEmpty;

use App\Http\Requests\SearchPropertyRequest;
use App\Http\Requests\PropertyContactRequest;

class PropertyController extends Controller
{
    public function index(SearchPropertyRequest $request){
        // if(isEmpty($request->validated())){
        //     abort('404');
        // }
        $query = Property::query()->orderByDesc('created_at');
        
        if($price = $request->validated('price')){
            $query = $query->where('price','<=',$price);
        }

        if($surface = $request->validated('surface')){
            $query = $query->where('surface','>=',$surface);
        }
        if($rooms = $request->validated('rooms')){
            $query = $query->where('rooms','>=',$rooms);
        }
        if($title = $request->validated('title')){
            $query = $query->where('title','like',"%{$title}%");
        }
    //   $properties = Property::paginate(16);
      return view('property.index',['properties'=>$query->paginate(16),'input'=>$request->validated()]);
    }


    public function show(string $slug,Property $property){


        $expectedSlug = $property->getSlug();
        if($slug !== $expectedSlug){
            return to_route('property.show',['slug'=>$expectedSlug,'property'=>$property]);
        }

        return view('property.show',['property'=>$property]);
    }


    public function contact(PropertyContactRequest $request,Property $property){

        Mail::send(new PropertyContactMail($property,$request->validated()));
        return back()->with('success','Votre demande de contact a bien ete envoye');

    }




}
