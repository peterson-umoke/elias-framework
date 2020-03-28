<?php

namespace Modules\Page\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\View\View;
use Modules\Core\Blade_DBCompiler\Facades\DbView;
use Modules\Page\Entities\Page;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param Page $page
     * @return Factory|Response|View
     */
    public function index(Page $page)
    {
        if (!empty($page)) return DbView::make($page)->with(['page' => $page])->render();
    }
}
