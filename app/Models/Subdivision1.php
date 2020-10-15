<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subdivision1 extends Model
{
	protected $table = 'subadmin1';
    protected $fillable = ['code', 'country_code', 'name', 'asciiname', 'active'];
    public $timestamps=false;
}
