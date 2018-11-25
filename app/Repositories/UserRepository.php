<?php
/**
 * Created by PhpStorm.
 * User: amir
 * Date: 11/25/18
 * Time: 12:18 PM
 */

namespace App\Repositories;

use App\Model\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\UserProvider;

class UserRepository extends AbstractRepository
{
    public function paginate()
    {
        return $this->model::paginate();
    }

    public function create(array $data)
    {
        return $this->model::create($data);
    }
}
