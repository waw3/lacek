<?php

namespace App\Http\Controllers\Dashboard;

use Hash, Auth;
use Illuminate\Http\Request;
use App\DataTables\PostsDataTable;
use App\Http\Controllers\Controller;
use App\Models\Posts;

class PostsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PostsDataTable $dataTable)
    {
        $this->authorize('viewAny', Post::class);
        return $dataTable->render('dashboard.posts.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Post::class);
        $post = new Post();

        return view('dashboard.posts.create', [
            'post' => $post
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Post::class);

        $data = $request->validate([
            "title" => "string|required",
            "description" => "nullable"
        ]);
        $data['user_id'] = Auth::user()->id;
        $data['publish'] = 1;
        $post = Post::create($data);

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $post->addMediaFromRequest('image')->toMediaCollection('image');
        }

        return redirect(route('dashboard.post.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        $this->authorize('view', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $this->authorize('update', $post);

        return view('dashboard.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $this->authorize('update', $post);
        $request->validate([
            "title" => "string|required",
            "description" => "nullable"
        ]);

        if ($request->hasFile('image')) {
            $post->clearMediaCollection('image');
            $post->addMediaFromRequest('image')->toMediaCollection('image');
        }

        return redirect(route('dashboard.posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $this->authorize('delete', $post);
        $post->delete();
        if ($post->hasFile('image')) {
            $post->clearMediaCollection('image');
        }
        return redirect(route('dashboard.posts.index'));
    }
}
