<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasUuid;

class Contract extends Model
{
    use HasUuid;

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    const UUID = 'id';

    protected $table = 'contracts';

    protected $fillable = [
        'id',
        'dealer_group_id',
        'client_id',
        'plan_id',
        'contract_date',
        'add_infos'
    ];

    public function dealer() {
        return $this->belongsTo(User::class);
    }

    public function client() {
        return $this->belongsTo(User::class);
    }

    public function plan() {
        return $this->belongsTo(Plan::class);
    }
    
    public function payments() {
        return $this->hasMany(Payment::class);
    }
}
