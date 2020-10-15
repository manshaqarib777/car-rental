<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = ['id', 'code', 'iso3', 'iso_numeric', 'fips', 'name', 'asciiname', 'capital', 'area', 'population', 'continent_code', 'tld', 'currency_code', 'phone', 'postal_code_format', 'postal_code_regex', 'languages', 'neighbours', 'equivalent_fips_code', 'background_image', 'admin_type', 'admin_field_active', 'active', 'created_at', 'updated_at'];
}
