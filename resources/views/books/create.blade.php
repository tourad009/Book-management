@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-4">Ajouter un Livre</h1>

@if ($errors->any())
    <div class="mb-4 bg-red-100 text-red-700 p-2 rounded">
        <ul>
            @foreach ($errors->all() as $error)
                <li>• {{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('books.store') }}" class="space-y-4">
    @csrf

    <div>
        <label for="title" class="block font-medium">Titre</label>
        <input type="text" name="title" id="title" class="w-full p-2 border rounded" required>
    </div>

    <div>
        <label for="author" class="block font-medium">Auteur</label>
        <input type="text" name="author" id="author" class="w-full p-2 border rounded" required>
    </div>

    <div>
        <label for="description" class="block font-medium">Description</label>
        <textarea name="description" id="description" class="w-full p-2 border rounded"></textarea>
    </div>

    <div>
        <label for="published_at" class="block font-medium">Date de publication</label>
        <input type="date" name="published_at" id="published_at" class="w-full p-2 border rounded">
    </div>

    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Ajouter le livre</button>
</form>
@endsection
