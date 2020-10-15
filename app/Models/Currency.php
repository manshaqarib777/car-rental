<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $fillable = ['code', 'name', 'html_entity', 'font_arial', 'font_code2000', 'unicode_decimal', 'unicode_hex', 'in_left', 'decimal_places', 'decimal_separator', 'thousand_separator', 'created_at', 'updated_at'];

}
