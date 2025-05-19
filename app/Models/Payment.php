<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payments';

    protected $fillable = [
        'id',
        'contract_id',
        'pay_date'
    ];

    public function contract() {
        return $this->belongsTo(Contract::class);
    }
}
