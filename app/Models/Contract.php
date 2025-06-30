<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasUuid;
use Carbon\Carbon;

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

    public function dealer_group() {
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

    public function calc_validity() {        
        $payment = $this->payments()->latest('pay_date')->first();
        if ($payment) {
            $validity = Carbon::parse($payment->pay_date);
            switch ($this->plan->duration_type) {
                case 'Diário':
                    $validity->addDays($this->plan->duration);
                    break;
                case 'Semanal':
                    $validity->addWeeks($this->plan->duration);
                    break;
                case 'Mensal':
                    $validity->addMonths($this->plan->duration);
                    break;
                case 'Anual':
                    $validity->addYears($this->plan->duration);
                    break;            
            }
            return $validity->format('d/m/Y'); 
        }
        return $this->contract_date;
    }    
}
