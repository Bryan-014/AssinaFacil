<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasUuid;

class Plan extends Model
{
    use HasUuid;

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    const UUID = 'id';

    protected $table = 'plans';

    protected $fillable = [
        'id',
        'service_id',
        'description',
        'price',
        'duration',
        'duration_type'
    ];

    public function service() {
        return $this->belongsTo(Service::class);
    }

    public function contract() {
        return $this->belongsTo(Contract::class);        
    }
}
