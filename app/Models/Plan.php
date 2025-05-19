<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $table = 'plans';

    protected $fillable = [
        'id',
        'service_id',
        'name',
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
