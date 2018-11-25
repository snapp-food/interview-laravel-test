<?php
/**
 * Created by PhpStorm.
 * User: amir
 * Date: 11/25/18
 * Time: 12:18 PM
 */

namespace App\Repositories;

use App\Model\Restaurant;

class RestaurantRepository extends AbstractRepository
{
    public function paginate()
    {
        return $this->model::paginate();
    }

    public function create(array $data)
    {
        return $this->model::create($data);
    }

    public function remove(\App\Model\Restaurant $restaurant)
    {
        return $restaurant->delete();
    }

    public function update(Restaurant $restaurant, $attributes)
    {
        return $restaurant->update($attributes);
    }
}
