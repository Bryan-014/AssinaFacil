<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasUuid;

class Service extends Model
{
    use HasUuid;

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    const UUID = 'id';

    protected $table = 'services';

    protected $fillable = [
        'id',
        'name',
        'description',
        'base_plan_id',
    ];

    public function plans() {
        return $this->hasMany(Plan::class);
    }
    
    public function contract() {
        return $this->belongsTo(Contract::class);        
    }
}
