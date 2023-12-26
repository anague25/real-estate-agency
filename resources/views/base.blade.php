<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
   
    <title>@yield('title') | Mon Agence</title>
</head>
<body>


    <nav class="navbar navbar-expand-lg bg-dark navbar-dark ">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Agency</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          @php
              $route = request()->route()->getName();
          @endphp


          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a @class(['nav-link', 'active'=>str_contains($route,'property.')])  href="{{route('property.index')}}">Property</a>
              </li> 
            </ul>
          </div>
        </div>
      </nav>



    <div class="container mt-5">

        @yield('content')

    </div>
    
</body>
</html>