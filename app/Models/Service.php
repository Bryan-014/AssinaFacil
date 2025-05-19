<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services';

    protected $fillable = [
        'id',
        'name',
        'description',
        'base_price',
        'base_duration',
        'duration_type'
    ];

    public function plans() {
        return $this->hasMany(Plan::class);
    }
    
    public function contract() {
        return $this->belongsTo(Contract::class);        
    }
}
