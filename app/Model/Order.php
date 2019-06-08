<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['status'];

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
