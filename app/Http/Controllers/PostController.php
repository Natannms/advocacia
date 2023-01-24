<?php

namespace App\Http\Controllers;

use App\Models\OccupationArea;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboardIndex()
    {
        $data = [
            'posts' => Post::orderBy('id', 'DESC')->paginate(6),
            'areas' => OccupationArea::all(),
        ];

        return view('post.dashboard.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.dashboard.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'short_description' => 'required',
            'body' => 'required',
            'image' => 'required',
        ]);

        $data = $request->all();

        // if image exists
        if ($request->image) {
            $data['image'] = $request->image->store('posts', 'public');
        }else{
            $data['image'] = 'https://fakeimg.pl/250x250/';
        }

       $post = Post::create([
            'title' => $data['title'],
            'body' => $data['body'],
            'short_description' => $data['short_description'],
            'instagram_link' => $data['instagram_link'] ? $data['instagram_link'] : null,
            'facebook_link' => $data['facebook_link'] ? $data['facebook_link'] : null,
            'twitter_link' =>  null,
            'image' => $data['image'],
        ]);

        if(!$post){
            return redirect()->back()->with('error', 'Erro ao criar post!');
        }

        return redirect()->back()->with('success', 'Post criado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $data = [
            'post' => Post::find($id),
        ];

        return view('post.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $post = Post::find($id);

        return view('post.dashboard.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //has image
        if ($request->hasFile('image')) {
           //trabalhar com imagem
        }

        $post = $post->find($request->id);

        if(!$post){
            return redirect()->back()->with('error', 'Post não encontrado!');
        }

        $post->update([
            'title' => $request->title,
            'body' => $request->body,
            'short_description' => $request->short_description,
            'instagram_link' => $request->instagram_link,
            'facebook_link' => $request->facebook_link,
            'twitter_link' => $request->twitter_link,
        ]);

       if($post){
           return back()->with('success', 'Post atualizado com sucesso!');
       }

         return redirect()->back()->with('error', 'Erro ao atualizar post!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        if(!$post){
            return redirect()->back()->with('error', 'Post não encontrado!');
        }

        $post->delete();

        return redirect()->back()->with('success', 'Post deletado com sucesso!');
    }
}
