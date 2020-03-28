<?php

namespace Modules\Page\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Admin\Entities\Permission;
use Modules\Admin\Entities\Role;
use Modules\Page\Entities\Page;

class PageDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // roles and acl
        $module = "pages";
        $levels = array('create', "access", "read", "update", "delete");
        $permissions = array();
        foreach ($levels as $level) {
            $permissions[] = Permission::firstOrCreate([
                'name' => $level . '-' . $module,
                'title' => ucfirst($level) . ' ' . ucfirst($module),
            ])->id;
        }

        $role = Role::where("name", "superadministrator")->first();
        $role->attachPermissions($permissions);

        $page = new Page();
        $page->name = "privacy-policies";
        $page->title = "Privacy Policies";
        $page->content = "This is an example page with supposed privacy policies in place";
        $page->seo_title = "The Privacy Policies";
        $page->route = "privacy_policies";
        $page->save();

        $page = new Page();
        $page->name = "terms-and-conditions";
        $page->title = "Terms and Conditions";
        $page->content = "This is an example page with supposed terms and conditions in place";
        $page->seo_title = "Terms, Conditions and our supposed policies";
        $page->route = "terms";
        $page->save();

        // $this->call("OthersTableSeeder");
    }
}
