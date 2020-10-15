<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Message extends Model
{
    protected $guarded = [];

    public function fromContact()
    {
        return $this->hasOne(User::class, 'id', 'from');
    }
}
