<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasUuid;

class Person extends Model
{
    use HasUuid;

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    const UUID = 'id';

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
