<?php

namespace Modules\Customer\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Admin\Entities\Permission;
use Modules\Admin\Entities\Role;
use Modules\Customer\Entities\Customer;

class CustomerDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $module = "customers";
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

        // craete a default customer
        $customer = new Customer();
        $customer->first_name ="Ebube";
        $customer->last_name ="Umoke";
        $customer->phone_number = "08094907266";
        $customer->email ="customer@customer.com";
        $customer->password = bcrypt("password");
        $customer->save();

        // $this->call("OthersTableSeeder");
    }
}
