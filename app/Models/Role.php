<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasUuid;

class Role extends Model
{
    use HasUuid;

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    const UUID = 'id';

    protected $table = 'roles';

    protected $fillable = [
        'id',
        'name'
    ];

    public function users() {
        return $this->hasMany(User::class);
    }
}
