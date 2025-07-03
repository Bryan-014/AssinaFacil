<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasUuid;
use Carbon\Carbon;

class Payment extends Model
{   
    use HasUuid;

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    const UUID = 'id';

    protected $table = 'payments';

    protected $fillable = [
        'id',
        'contract_id',
        'pay_date',
        'value',
        'plan_id'
    ];

    public function contract() {
        return $this->belongsTo(Contract::class);
    }

    public function plan() {
        return $this->hasOne(Plan::class);
    }

    public function getMaskPayDateAttribute() {
        return Carbon::parse($this->pay_date)->format('d/m/Y');
    }

    public function getMaskValueAttribute() {
        return 'R$ '.number_format($this->value, 2, ',', '.');
    }
}
