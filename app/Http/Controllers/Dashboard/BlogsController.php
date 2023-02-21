<?php

namespace App\Http\Controllers\Dashboard;


use Hash, Auth, Storage;
use Illuminate\Http\Request;
use App\DataTables\BlogsDataTable;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Http\Requests\Blog\StoreRequest;
use App\Http\Requests\Blog\UpdateRequest;

class BlogsController extends Controller
{

    /**
     * Method __construct
     *
     * @return void
     */
    public function __construct()
    {
        // apply middleares here
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(BlogsDataTable $dataTable)
    {
        $this->authorize('viewAny', Blog::class);
        return $dataTable->render('dashboard.blogs.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Blog::class);
        $blog = new Blog();

        return view('dashboard.blogs.create', compact('blog'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {

        $this->authorize('create', Blog::class);

        $photoPath = "images/default.png";
        if ($request->has('photo')) {
            $ext = $request->file('photo')->getClientOriginalExtension();
            $photoPath = $request->file('photo')->storeAs('images', uniqid() . "." . $ext, 'public');
        }

        $data = $request->validated();
        $data['user_id'] = Auth::user()->id;
        $data['photo'] = $photoPath;
        //dd($data);
        $blog = Blog::create($data);

        return redirect()->route('dashboard.blogs.index')->withSuccess('Blog Created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        $this->authorize('view', $blog);

        return view('blogs.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        $this->authorize('update', $blog);
        return view('dashboard.blogs.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Blog $blog)
    {
        $photoPath = $blog->photo;
        if ($request->has('photo')) {
            $ext = $request->file('photo')->getClientOriginalExtension();
            $photoPath = $request->file('photo')->storeAs('images', uniqid() . "." . $ext, 'public');
        }

        $blog->update($request->validated());
        $blog->update(['photo' => $photoPath]);

        return redirect()->route('dashboard.blogs.index')->withSuccess('Blog Updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $this->authorize('delete', $blog);

        if(Storage::exists($blog->photo)){
            Storage::delete($blog->photo);
        }

        $blog->delete();

        return redirect(route('dashboard.blogs.index'));
    }
}