<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'price'];

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
}
