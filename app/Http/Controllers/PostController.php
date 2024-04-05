<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('posts.index', [
            //'posts' => Post::orderBy('created_at', 'desc')->get()
            //Esto es para precargar el usuario y consumir menos tiempo
            //De lo contrario (llamando directamente al lastest sin el with)
            //se hacía una consulta por cada post
            'posts' => Post::with('user')->latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'message'=> ['required', 'min:3', 'max:1000'],
        ]);

        $request ->user()->posts()->create($validated);

        // Obtener el usuario autenticado
        // $user = auth()->user();

        // // Crear un nuevo post asociado con el usuario
        // $post = $user->posts()->create([
        //     'message' => $validated['message'],
        // ]);

        //Otra opción
        // $request->user()->posts->create([
        //     'message'=> $request->get('message'),
        // ]);

        //session()->flash('status', '¡Post creado correctamente!');
        return to_route('posts.index')
        ->with('status',__('Post created successfully!'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.edit', [
            'post' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
