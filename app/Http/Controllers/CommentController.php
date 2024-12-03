<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        // Valider les données envoyées par le formulaire
        $validated = $request->validate([
            'idUser' => 'required|exists:users,id',  // Vérifie si l'utilisateur existe
            'message' => 'required|string|max:1000',  // Assurez-vous que le message est valide
        ]);

        // Créer un nouveau commentaire dans la base de données
        $comment = Comment::create([
            'idUser' => $validated['idUser'],
            'comment_text' => $validated['message'],  // Utilisez 'message' pour 'comment_text'
            'is_accept_show' => false,  // Si nécessaire, ajustez cette valeur
        ]);

        // Retourner à la page précédente avec un message de succès
        return back()->with('success', 'Votre commentaire a été ajouté avec succès!');
    }
}
