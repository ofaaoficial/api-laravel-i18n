<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Validator;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        $data = $request->json()->all();

        $validator = Validator::make($data, [
            'user_id' => 'required|exists:users,id'
        ]);

        if($validator->fails()) return response()->json($validator->errors(), 406);

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

        return response()->json($post, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(Post::find($id), 200);
    }
}
