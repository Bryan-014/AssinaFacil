<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $table = 'contracts';

    protected $fillable = [
        'id',
        'dealer_id',
        'client_id',
        'service_id',
        'plan_id',
        'contract_date',
        'add_infos'
    ];

    public function dealer() {
        return $this->hasOne(Person::class);
    }

    public function client() {
        return $this->hasOne(Person::class);
    }

    public function service() {
        return $this->hasOne(Service::class);
    }

    public function plan() {
        return $this->hasOne(Person::class);
    }
}
