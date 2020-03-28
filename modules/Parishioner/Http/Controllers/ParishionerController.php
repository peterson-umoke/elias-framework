<?php

namespace Modules\Parishioner\Http\Controllers;

use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Modules\Admin\Http\Controllers\Controller;
use Modules\Parishioner\Entities\Parishioner;
use Illuminate\Support\Facades\Storage;

class ParishionerController extends Controller
{
    public function __construct()
    {
        $this->middleware("admin.authenticate:admin");
    }

    /**
     * Display a listing of the resource.
     * @return Factory|View
     */
    public function index()
    {
        $title = "All Parishioners";
        $all = Parishioner::all();
        $table_cols = [
            'full_name',
            'email',
            'address',
            'created_at',
        ];
        return view('parishioner::index', compact("title", 'all', 'table_cols'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Factory|View
     */
    public function create()
    {
        $title = "Create Parishioner";
        return view('parishioner::create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
//        $request->validate([]);
        $id = Parishioner::create($request->except('_token', "profile_picture"));
        if ($request->hasFile("profile_picture")) {
            $storeAs = "parishioners";
            $path = module_path("Admin", "Uploads/$storeAs");

            // delete old files
//            $get_old_values = $settings->get_setting_value($file_key, $channel);
//            Storage::disk('admin')->delete($get_old_values);


            $file = $request->file("profile_picture");
            $file_extension = $file->getClientOriginalExtension();
            $file_name = uniqid() . "." . $file_extension;
            $file->move($path, $file_name);

            // save the data
            $value = $storeAs . "/" . $file_name;
            Parishioner::find($id)->update([
                "profile_picture" => $value
            ]);
        }


        $this->notify("Parishioner Created successfully");
        return redirect()->route("admin.parishioners.index");
    }

    /**
     * Show the specified resource.
     * @param Parishioner $parishioner
     * @return Factory|View
     */
    public function show(Parishioner $parishioner)
    {
        $title = "Viewing Parishioner";
        return view('parishioner::show', compact('parishioner', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param Parishioner $parishioner
     * @return Factory|View
     */
    public function edit(Parishioner $parishioner)
    {
        $title = "Edit Parishioner";
        return view('parishioner::edit', compact('parishioner', 'title'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param Parishioner $parishioner
     * @return RedirectResponse
     */
    public function update(Request $request, Parishioner $parishioner)
    {
        //        $request->validate([]);
        $id = $parishioner->update($request->except('_token', "profile_picture"));
        if ($request->hasFile("profile_picture")) {
            $storeAs = "parishioners";
            $path = module_path("Admin", "Uploads/$storeAs");

            // delete old files
            $get_old_values = $parishioner->profile_picture;
            Storage::disk('admin')->delete($get_old_values);


            $file = $request->file("profile_picture");
            $file_extension = $file->getClientOriginalExtension();
            $file_name = uniqid() . "." . $file_extension;
            $file->move($path, $file_name);

            // save the data
            $value = $storeAs . "/" . $file_name;
            $parishioner->update([
                "profile_picture" => $value
            ]);
        }

        $this->notify("Parishioner Updated successfully");
        return redirect()->route("admin.parishioners.index");
    }

    /**
     * Remove the specified resource from storage.
     * @param Parishioner $parishioner
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Parishioner $parishioner)
    {
        $parishioner->delete();

        $this->notify("Parishioner deleted successfully");
        return redirect()->back();
    }
}
