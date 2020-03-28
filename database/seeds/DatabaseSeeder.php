<?php

use Illuminate\Database\Seeder;
use Modules\Admin\Database\Seeders\AdminDatabaseSeeder;
use Modules\Category\Database\Seeders\CategoryDatabaseSeeder;
use Modules\Comments\Database\Seeders\CommentsDatabaseSeeder;
use Modules\Customer\Database\Seeders\CustomerDatabaseSeeder;
use Modules\Layout\Database\Seeders\LayoutDatabaseSeeder;
use Modules\Page\Database\Seeders\PageDatabaseSeeder;
use Modules\Parishioner\Database\Seeders\ParishionerDatabaseSeeder;
use Modules\Post\Database\Seeders\PostDatabaseSeeder;
use Modules\Product\Database\Seeders\ProductDatabaseSeeder;
use Modules\Video\Database\Seeders\VideoDatabaseSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call([
            AdminDatabaseSeeder::class,
            PageDatabaseSeeder::class,
            PostDatabaseSeeder::class,
            ProductDatabaseSeeder::class,
            ParishionerDatabaseSeeder::class,
            LayoutDatabaseSeeder::class,
            VideoDatabaseSeeder::class,
            CustomerDatabaseSeeder::class,
            CategoryDatabaseSeeder::class,
            CommentsDatabaseSeeder::class,
        ]);
    }
}
