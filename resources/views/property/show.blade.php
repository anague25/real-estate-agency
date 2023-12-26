@extends('base')

@section('title',$property->title)

@section('content')

<div class="container mb-5">
    <h1>{{$property->title}}</h1>
    <h1>{{$property->rooms}} pieces - {{$property->surface }} m²</h1>
    
    <div class="text-primary fw-bold" style="font-size:4rem;">
    
        {{number_format($property->price, thousands_separator:' ')}} $
    
    </div>

    <hr>

    <div class="mt-4">
        <h4>Interesse par ce bien</h4>

        @include('shared.flash')

        <form action="{{route('property.contact',['property'=>$property])}}" method="post" class="vstack gap-3">
            @csrf
            <div class="row">
                @include('shared.input',['class'=>'col','name'=>'firstname','label'=>'Prenom'])
                @include('shared.input',['class'=>'col','name'=>'lastname','label'=>'Nom'])

            </div>

            <div class="row">
                @include('shared.input',['class'=>'col','name'=>'phone','label'=>'Telephone'])
                @include('shared.input',['class'=>'col','name'=>'email','label'=>'Email','type'=>'email'])

            </div>


            @include('shared.input',['name'=>'message','class'=>'col','label'=>'Votre message','type'=>'textarea'])



            <div>
                <button class="btn btn-primary">Nous Contacter</button>

            </div>
        </form>
    </div>


    <div class="mt-4">
        <p>{!! nl2br($property->description) !!}</p>

        <div class="row">
            <div class="col-8">
                <h2>Caracteristiques</h2>
                <table class="table-striped table">
                    <tr>
                        <td>Surface habitable</td>
                        <td>{{$property->surface}} m²</td>
                    </tr>
                    <tr>
                        <td>Pieces</td>
                        <td>{{$property->rooms}} </td>
                    </tr>
                    <tr>
                        <td>Chambres</td>
                        <td>{{$property->bedrooms}} </td>
                    </tr>
                    <tr>
                        <td>Etages</td>
                        <td>{{$property->floor ?: 'Rez de chausse'}} </td>
                    </tr>
                    <tr>
                        <td>Localisation</td>
                        <td>{{$property->address}} <br> {{$property->postal_code}} </td> 
                        
                    </tr>
                </table>
            </div>
            <div class="col-4">
                <h2>Specificites</h2>
                <ul class="list-group">
                        @forelse ($property->option as $option)

                            <li class="list-group-item">
                                {{$option->name}}
                            </li>
                            
                        @empty
                            <span class="text-center text-warning fw-bold my-3">Cette proprietee n'as encore d'option.</span>
                        @endforelse
                </ul>
            </div>
        </div>
    </div>

</div>


@endsection