@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold mb-6">📚 Liste des livres</h1>

    <a href="{{ route('books.create') }}" class="inline-block bg-blue-500 text-white px-4 py-2 rounded mb-6 hover:bg-blue-600 transition">
        Ajouter un livre
    </a>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @foreach($books as $book)
            <div class="bg-white rounded-xl shadow-md p-4 hover:shadow-lg transition">
                <h2 class="text-xl font-semibold text-blue-700">{{ $book->title }}</h2>
                <p class="text-sm text-gray-500">Auteur : {{ $book->author }}</p>
                <p class="mt-2 text-gray-600 line-clamp-3">{{ Str::limit($book->description, 100) }}</p>
                <a href="/books/{{ $book->id }}" class="mt-3 inline-block text-sm text-blue-500 hover:underline">
                    Voir détails →
                </a>
                <form action="{{ route('books.destroy', $book->id) }}" method="POST" onsubmit="return confirm('Confirmer la suppression ?')" class="mt-2">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500 hover:underline text-sm">🗑️ Supprimer</button>
                </form>

            </div>
        @endforeach
    </div>
@endsection
