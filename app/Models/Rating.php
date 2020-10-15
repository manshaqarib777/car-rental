<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Car;

class Rating extends Model
{
    protected $table = 'ratings';

    public $fillable = ['rating', 'car_id', 'user_id','message'];

    /**
     * @return mixed
     */
    public function rateable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}
