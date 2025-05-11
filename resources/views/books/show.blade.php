@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto bg-white shadow p-6 rounded-lg">
        <h1 class="text-2xl font-bold text-blue-700 mb-2">{{ $book->title }}</h1>
        <p class="text-sm text-gray-500 mb-1">Auteur : {{ $book->author }}</p>
        <p class="text-gray-700 mb-6">{{ $book->description }}</p>

        <h2 class="text-xl font-semibold border-b pb-1 mb-4">🗣️ Avis des lecteurs</h2>
        @forelse($book->reviews as $review)
            <div class="mb-4 p-3 bg-gray-100 rounded-lg">
                <p class="text-sm text-gray-800 italic">« {{ $review->content }} »</p>
                <div class="flex justify-between text-sm text-gray-600 mt-1">
                    <span>⭐ {{ $review->rating }}/5</span>
                    <span>— {{ $review->user->name ?? 'Anonyme' }}</span>
                </div>
            </div>
        @empty
            <p class="text-gray-500">Aucun avis pour ce livre pour le moment.</p>
        @endforelse

        <h3 class="text-lg font-semibold mt-6 mb-2">➕ Ajouter un avis</h3>
        <form action="{{ route('reviews.store') }}" method="POST" class="space-y-3">
            @csrf
            <input type="hidden" name="book_id" value="{{ $book->id }}">

            <!-- Champ pour l'adresse email de l'utilisateur -->
            <div>
                <label for="user_email" class="block text-sm text-gray-700">Votre E-mail</label>
                <input type="email" name="user_email" id="user_email" class="w-full border border-gray-300 p-2 rounded" placeholder="Votre e-mail" required>
            </div>

            <textarea name="content" rows="3" class="w-full border border-gray-300 p-2 rounded" placeholder="Votre avis..." required></textarea>

            <div>
                <label class="text-sm text-gray-700 mr-2">Note :</label>
                <select name="rating" class="border rounded p-1">
                    @for($i = 1; $i <= 5; $i++)
                        <option value="{{ $i }}">{{ $i }}/5</option>
                    @endfor
                </select>
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Envoyer l’avis
            </button>
        </form>
    </div>
@endsection
