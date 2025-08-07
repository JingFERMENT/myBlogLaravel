@extends('base');

@section('title', 'Créer un nouvel article')

@section('content')
    <h1>Créer un nouvel article</h1>

    <form action="" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="title">Titre</label>
            <input type="text" name="title" id="title" class="form-control" required value ="{{ old('title') }}">
            <label for="content">Contenu</label>
            <textarea name="content" id="content" class="form-control" rows="5" value ="{{ old('content') }}" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Publier</button>
    </form>

    <p>
        <a href="{{ route('blog.index') }}" class="btn btn-secondary">Retour à la liste des articles</a>    
    </p>
@endsection
