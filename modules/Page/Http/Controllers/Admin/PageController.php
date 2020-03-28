<?php

namespace Modules\Page\Http\Controllers\Admin;

use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Modules\Admin\Http\Controllers\Controller;
use Modules\Core\Blade_DBCompiler\Facades\DbView;
use Modules\Page\Entities\Page;

class PageController extends Controller
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
        abort_unless(current_admin()->can('access-pages'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pages = Page::all();
        $title = "All Pages";
        $table_cols = [
            "Name",
            "SEO Title",
            "SEO Description",
            "Created on"
        ];

        return view('page::admin.index', compact('pages', 'title', "table_cols"));
    }

    /**
     * Show the form for creating a new resource.
     * @return Factory|Response|View
     */
    public function create()
    {
        abort_unless(current_admin()->can('create-pages'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $title = "Create Page";
        return view('page::admin.create', compact("title"));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function store(Request $request)
    {
        abort_unless(current_admin()->can('create-pages'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $request->validate([
            "title" => "required|min:5",
            "pcontent" => "required|min:5",
            "seo_title" => "nullable|min:5",
            "seo_content" => "nullable|min:5",
            "route" => "required|min:5",
        ]);

        $page = new Page();
        $page->title = $request->title;
        $page->content = $request->pcontent;
        $page->seo_title = $request->seo_title;
        $page->seo_content = $request->seo_content;
        $page->route = $request->route;
        $page->save();

        $this->notify("Page Created Successfully");
        return redirect()->route("admin.pages.show", $page->id);
    }

    /**
     * Show the specified resource.
     * @param Page $page
     * @return Factory|Response|View
     */
    public function show(Page $page)
    {
        abort_unless(current_admin()->can('read-pages'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $title = "Previewing Page";

        return view('page::admin.show', compact("page", "title"));
    }

    /**
     * Show the form for editing the specified resource.
     * @param Page $page
     * @return Factory|Response|View
     */
    public function edit(Page $page)
    {
        abort_unless(current_admin()->can('update-pages'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $title = "Editing Page";
        return view('page::admin.edit', compact('page', 'title'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param Page $page
     * @return RedirectResponse|Response
     */
    public function update(Request $request, Page $page)
    {
        abort_unless(current_admin()->can('update-pages'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $request->validate([
            "title" => "required|min:5",
            "pcontent" => "required|min:5",
            "seo_title" => "nullable|min:5",
            "seo_content" => "nullable|min:5",
            "name" => "nullable|min:5",
            "route" => "required|min:5",
        ]);

        $page->title = $request->title;
        $page->content = $request->pcontent;
        $page->route = $request->route;
        $page->seo_title = $request->seo_title;
        $page->seo_content = $request->seo_content;
        if (!empty($request->name)) {
            $page->name = $request->name;
        }
        $page->save();

        $this->notify("Page Updated Successfully");
        return redirect()->route("admin.pages.show", $page->id);
    }

    /**
     * Remove the specified resource from storage.
     * @param Page $page
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Page $page)
    {
        abort_unless(current_admin()->can('delete-pages'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $page->delete();
        $this->notify("Page Deleted Successfully");

        return redirect()->route("admin.pages.index");
    }
}
