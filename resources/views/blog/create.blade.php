@extends('base');

@section('title', 'Créer un nouvel article')

@section('content')
    <h1>Créer un nouvel article</h1>

    <form action="" method="POST" novalidate>
        @csrf
        <div class="form-group mb-3">
            {{-- titre --}}
            <label for="title">Titre</label>
            {{-- récupérer les anciens valeurs --}}
            <input type="text" name="title" id="title" class="form-control" required value ="{{ old('title', 'Mon titre') }}">
            
            {{-- Message d'erreur de titre --}}
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            
            {{-- slug --}}
            <label for="slug">Slug</label>
            <input type="text" name="slug" id="slug" class="form-control" required value ="{{ old('slug', 'mon-slug') }}">
             {{-- Message d'erreur de titre slug --}}
            @error('slug')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            {{-- Contenu --}}
            <label for="content">Contenu</label>
            <textarea name="content" id="content" class="form-control" rows="5" required>{{ old ('content', 'Mon contenu de démonstration')}}</textarea>
            
            {{-- Message d'erreur de contenu --}}
            @error('content')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary mt-3">Publier</button>
    </form>

    <p>
        <a href="{{ route('blog.index') }}" class="btn btn-secondary">Retour à la liste des articles</a>    
    </p>
@endsection
