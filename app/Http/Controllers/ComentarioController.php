<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    public function store(Request $request, User $user, Post $post) {
        
        $this->validate($request, [
            'comentario' => 'required|max:255'
        ]);

        //Crear comentario

        Comentario::create([
            'comentario' => $request->comentario,
            'post_id' => $post->id,
            'user_id' => auth()->user()->id
        ]); 

        return back()->with('mensaje', 'Comentario realizado correctamente');

    }
}
