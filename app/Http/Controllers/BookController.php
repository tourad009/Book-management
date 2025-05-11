<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with('reviews.user')->get(); 
        return view('books.index', compact('books'));
    }

    public function show($id)
    {
        $book = Book::with('reviews.user')->findOrFail($id);
        return view('books.show', compact('book'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'description' => 'nullable|string',
            'published_at' => 'required|date',
        ]);

        Book::create($validated);

        return redirect()->route('books.index')->with('success', 'Livre ajouté avec succès.');
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Livre supprimé avec succès.');
    }

}
