<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $fillable = ['name', 'slug', 'status','cat_id'];
    public $timestamps = false;
    
    public function category() {
      return $this->belongsTo('App\Models\Category','cat_id','id');
    }
}
