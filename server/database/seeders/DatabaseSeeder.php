<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Shop;
use App\Models\ShopBusinessInfo;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        User::factory(10)->create();
        Shop::factory(10)->create()->each(function ($shop) {
            ShopBusinessInfo::factory(10)->create(['shop_id' => $shop->id]);
        });
    }
}
