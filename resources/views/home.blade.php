@extends('base')

@section('title','les biens')
    
@section('content')
    <div class="p-5 mb-5 text-center bg-light">
      <div class="container">
        <h1>Agence Imobiliere</h1>

        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nesciunt minima ipsa ipsam explicabo, perferendis a
            t, fuga eligendi ab aliquam totam modi nostrum esse consequuntur nulla tenetur error blanditiis rerum rem.</p>
      </div>
    </div>

    <div class="container">
        <h2>Nos derniers biens</h2>
        <div class="row">
            @forelse ($properties as $property)
                <div class="col">
                    @include('property.card')
                </div>
            @empty
                <div class="col">
                    <h3 class="text-center fw-bold text-danger">
                        Pas De Biens
                    </h3>
                </div>
            @endforelse
        </div>
    </div>
@endsection