<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\User;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'content' => 'required',
            'rating' => 'required|integer|min:1|max:5',
            'book_id' => 'required|exists:books,id',
            'user_email' => 'required|email', // Validation de l'email de l'utilisateur
        ]);

        // Vérifier si l'utilisateur existe déjà dans la base de données
        $user = User::firstOrCreate(
            ['email' => $request->user_email], // Cherche l'utilisateur par email
            ['name' => 'Anonyme', 'password' => bcrypt('defaultPassword')] // Mot de passe par défaut
        );

        // Créer l'avis
        Review::create([
            'content' => $request->content,
            'rating' => $request->rating,
            'book_id' => $request->book_id,
            'user_id' => $user->id,  // Associer l'avis à l'utilisateur
        ]);

        return redirect()->back()->with('success', 'Avis ajouté avec succès.');
    }
}
