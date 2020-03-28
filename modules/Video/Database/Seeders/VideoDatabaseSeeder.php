<?php

namespace Modules\Video\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Admin\Entities\Permission;
use Modules\Admin\Entities\Role;

class VideoDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $module = "videos";
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

        // $this->call("OthersTableSeeder");
    }
}
