<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(!$request->isJson()) return response()->json(['message' => 'Tipo de dato incorrecto.'], 406);
        return response()->json(Post::all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!$request->isJson()) return response()->json(['message' => 'Tipo de dato incorrecto.'], 406);

        $data = $request->json()->all();

        $userExists = User::where('id', $data['user_id'])->exists();

        if(!$userExists) return response()->json(['error' => 'El usuario no existe.'], 406);

        $translations = $data['translations'];

        $dataToBeSaved = [
            'user_id' => $data['user_id'],
        ];

        foreach($translations as $translation){
            $dataToBeSaved[$translation['locale']] = [
                'title' => $translation['title'],
                'description' => $translation['description']
            ];
        }

        $post = Post::create($dataToBeSaved);

        return response()->json($post);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        if(!$request->isJson()) return response()->json(['message' => 'Tipo de dato incorrecto.'], 406);
        return response()->json(Post::find($id), 200);
    }
}
