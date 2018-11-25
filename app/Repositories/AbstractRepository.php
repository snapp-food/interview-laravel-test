<?php
/**
 * Created by PhpStorm.
 * User: amir
 * Date: 11/25/18
 * Time: 12:44 PM
 */

namespace App\Repositories;


use Illuminate\Database\Eloquent\Model;

class AbstractRepository
{
    /**
     * @var string
     */
    protected $model;

    /**
     * Repository constructor.
     * @param string $model
     *
     * @throws \ReflectionException
     */
    public function __construct(string $model)
    {
        $reflection = new \ReflectionClass($model);
        if (!$reflection->isSubclassOf(Model::class)) {
            throw new \InvalidArgumentException(sprintf("%s must be instance of %s", $model, Model::class));
        }
        $this->model = $model;
    }
}
