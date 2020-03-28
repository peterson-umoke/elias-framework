<?php

namespace Modules\Post\Http\Controllers\Admin;

use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Modules\Admin\Http\Controllers\Controller;
use Modules\Category\Entities\Category;

class CategoriesController extends Controller
{
    /**
     * @var string the model namespace
     */
    protected $namespace = "Modules\Post\Entities\Post";

    /**
     * @var string the view path
     */
    protected $view_path = "post::admin.categories";

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
            "created_at",
        ];
        $all = (new Category)->findRelatedCategories($this->namespace)->get();
        $title = "All Categories";
        return view($this->view_path . '.index', compact('all', 'table_cols', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Factory|Response|View
     */
    public function create()
    {
        return view('post::admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param Category $category
     * @return Factory|Response|View
     */
    public function show(Category $category)
    {
        return view('post::admin.categories.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param Category $category
     * @return Factory|Response|View
     */
    public function edit(Category $category)
    {
        return view('post::admin.categories.edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param Category $category
     * @return void
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param Category $category
     * @return void
     */
    public function destroy(Category $category)
    {
        //
    }
}
