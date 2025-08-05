<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    {{-- inclure bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>

<body>
    
    @php
    // get the current route name
    $currentRouteName = request()->route()->getName();
    @endphp

    {{-- inclure a navbar --}}
    <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Blog</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        {{-- get the current route name and use @class--}}
                        <a @class(['nav-link', 'active' => str_starts_with($currentRouteName, 'blog.')]) 
                            aria-current="page" href="{{route('blog.index')}}"> Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Liens</a>
                    </li>                 
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        @yield('content')
    </div>
</body>

</html>
