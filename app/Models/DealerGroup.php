<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasUuid;
use Carbon\Carbon;

class DealerGroup extends Model
{
    use HasUuid;

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    const UUID = 'id';

    protected $table = 'dealer_group';

    protected $fillable = [
        'id',
        'dealer_id',
        'client_list'
    ];

    public function users() {
        return $this->hasMany(User::class);
    } 
}
