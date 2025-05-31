<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasUuid;

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
        'pay_date'
    ];

    public function contract() {
        return $this->belongsTo(Contract::class);
    }
}
