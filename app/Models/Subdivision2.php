<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subdivision2 extends Model
{
	protected $table = 'subadmin2';
    protected $fillable = ['code', 'country_code', 'name', 'asciiname', 'active'];
    public $timestamps=false;
}
