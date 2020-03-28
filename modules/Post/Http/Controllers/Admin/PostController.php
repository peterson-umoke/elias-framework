<?php

namespace Modules\Post\Http\Controllers\Admin;

use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Modules\Admin\Http\Controllers\Controller;
use Modules\Post\Entities\Post;

class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware("admin.authenticate:admin");
    }

    /**
     * Display a listing of the resource.
     * @return Factory|Response|View
     */
    public function index()
    {
        $table_cols = [
            "title",
            "seo_title",
            "created_at",
        ];
        $title = "All Posts";
        $posts = Post::all();

        return view('post::admin.index', compact('table_cols','title','posts'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Factory|Response|View
     */
    public function create()
    {
        return view('post::admin.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "title" => "required",
            "content" => "required",
            "seo_content" => "nullable|min:5",
            "seo_title" => "nullable|min:5",
        ]);

        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->input("content");
        $post->seo_content = $request->seo_content;
        $post->seo_title = $request->seo_title;
        $post->save();

        $this->notify("Post Created Successfully");
        return redirect()->route("admin.posts.show", $post->id);
    }

    /**
     * Show the specified resource.
     * @param Post $post
     * @return Factory|Response|View
     */
    public function show(Post $post)
    {
        return view('post::admin.show', compact("post"));
    }

    /**
     * Show the form for editing the specified resource.
     * @param Post $post
     * @return Factory|Response|View
     */
    public function edit(Post $post)
    {
        return view('post::admin.edit', compact("post"));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param Post $post
     * @return RedirectResponse|void
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            "title" => "required",
            "content" => "required",
            "name" => "nullable|min:5",
            "seo_content" => "nullable|min:5",
            "seo_title" => "nullable|min:5",
        ]);

        $post->name = $request->name;
        $post->title = $request->title;
        $post->content = $request->input("content");
        $post->seo_content = $request->seo_content;
        $post->seo_title = $request->seo_title;
        $post->save();

        $this->notify("Post Updated Successfully");
        return redirect()->route("admin.posts.show", $post->id);
    }

    /**
     * Remove the specified resource from storage.
     * @param Post $post
     * @return RedirectResponse|void
     * @throws Exception
     */
    public function destroy(Post $post)
    {
        $post->delete();

        $post->categories()->detach();

        $this->notify("Post Deleted Successfully");
        return redirect()->route("admin.posts.index", $post->id);
    }
}
