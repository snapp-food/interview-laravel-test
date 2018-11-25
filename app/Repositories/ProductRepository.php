<?php
/**
 * Created by PhpStorm.
 * User: amir
 * Date: 11/25/18
 * Time: 12:18 PM
 */

namespace App\Repositories;

use App\Model\Product;
use App\Model\Restaurant;

class ProductRepository extends AbstractRepository
{
    public function paginate(Restaurant $restaurant = null)
    {
        return $restaurant->products()->paginate();
    }

    public function create(Restaurant $restaurant, array $data)
    {
        return $restaurant->products()->create($data);
    }

    public function remove(Product $restaurant)
    {
        return $restaurant->delete();
    }

    public function update(Product $product, $attributes)
    {
        return $product->update($attributes);
    }

    public function findByRestaurant(Restaurant $restaurant, $id)
    {
        return $restaurant->products()->find($id);
    }
}
