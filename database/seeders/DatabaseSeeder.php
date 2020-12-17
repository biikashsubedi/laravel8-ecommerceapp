<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();
        Category::factory(10)->create();
        SubCategory::factory(10)->create();
        Product::factory(20)->create();

        User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'phone'=>'977-9821241529',
            'address'=>'Bharatput, Chitwan',
            'email_verified_at' => now(),
            'is_admin'=>1,
            'password' => bcrypt('admin')
        ]);
    }
}
