<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\PostRequets;
use Illuminate\Support\Str;
use DateTime;
use Illuminate\Auth\Access\Gate;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
        $this->middleware('can:list-posts',['only'=>['index']]);
        $this->middleware('can:add-posts',['only'=>['create','strore']]);
        $this->middleware('can:edit-posts',['only'=>['edit','update']]);
        $this->middleware('can:delete-posts',['only'=>['destroy']]);
        $this->middleware('can:detail-posts',['only'=>['view']]);

    }

    public function index()
    {

        $data = Post::paginate(5);
        return view('backend.Post.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.Post.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequets $request)
    {
        $now = new DateTime();
        $data = request()->except('_token');
        $data['slug'] = Str::slug($data['title']);
        $data['title'] = Str::title($data['title']);
        $data['day_add'] = $now;
        Post::create($data);
        return redirect()->route('post.index')->with('msg', 'Thêm bài viết thành công !');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('backend.Post.detail', ['data' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('backend.Post.edit', ['data' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequets $request, Post $post)
    {
        $now = new DateTime();
        $data = request()->except('_token');
        $data['slug'] = Str::slug($data['title']);
        $data['title'] = Str::title($data['title']);
        $data['day_add'] = $now;
        $post->update($data);
        return redirect()->route('post.index')->with('msg', 'Cập nhập bài viết thành công !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return response()->json(['message' => "Xóa bài viết thành công"]);
    }
}
