<?php

namespace Modules\Customer\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Setting;
use Modules\Core\Blade_DBCompiler\Facades\DbView;
use Modules\Page\Entities\Page;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $setting = new Setting();
        if ($setting->get_setting_value("dynamic_front_page")) {
            $page = Page::find($setting->get_setting_value("front_page", "all"));
            return DbView::make($page)->with(['page' => $page])->render();
        }

        return view('customer::index');
    }
}
