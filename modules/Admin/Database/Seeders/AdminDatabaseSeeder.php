<?php

namespace Modules\Admin\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Admin\Entities\Admin;
use Modules\Admin\Entities\Setting;

class AdminDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(LaratrustSeeder::class);

        $admin = new Admin();
        $admin->first_name = "Peterson";
        $admin->last_name = "Umoke";
        $admin->email = "admin@admin.com";
        $admin->password = bcrypt("password");
        $admin->save();

        $admin->attachRole('superadministrator');

        $setting = new Setting();
        $setting->save_setting("dynamic_front_page", 0);
        $setting->save_setting("allow_logo_for_admin_name", 0);
        $setting->save_setting("allow_logo_for_site_name", 0);
        $setting->save_setting("allow_seo", 0);
        $setting->save_setting("site_tagline", 0);
        $setting->save_setting("site_name", env("APP_NAME"));
        $setting->save_setting("mail_username", env("MAIL_USERNAME"));
        $setting->save_setting("mail_password", env("MAIL_PASSWORD"));
        $setting->save_setting("mail_port", env("MAIL_PORT"));
        $setting->save_setting("mail_encryption_type", env("MAIL_ENCRYPTION"));
        $setting->save_setting("admin_email", env("MAIL_FROM_ADDRESS"));
        $setting->save_setting("admin_name", env("MAIL_FROM_NAME"));

    }
}
