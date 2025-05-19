<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $table = 'persons';

    protected $fillable = [
        'id',
        'email',
        'name'
    ];

    public function user() {
        return $this->hasOne(User::class);
    }
}
