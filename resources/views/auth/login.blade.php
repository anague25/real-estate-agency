@extends('base')

@section('title','Se Connecter')
    

@section('content')

    <div class="mt-4 container">
        <h1>@yield('title')</h1>

        @include('shared.flash')

        <form method="post" class="vstack gap-3" action="{{route('login')}}">
        
            @csrf
            @include('shared.input',['type'=>'email','class'=>'col','name'=>'email','label'=>'Email'])
            @include('shared.input',['type'=>'password','class'=>'col','name'=>'password','label'=>'Password'])
            <div>
                <button class="btn btn-primary">
                    Se Connecter
                </button>
            </div>
        </form>
    </div>
    
@endsection