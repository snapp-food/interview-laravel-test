<?php

use App\Model\Restaurant;
use Illuminate\Database\Seeder;

class RestaurantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Model\Restaurant::class, 50)->create()->each(function (Restaurant $restaurant) {
            $restaurant->products()->save(factory(App\Model\Product::class)->make());
        });
    }
}
