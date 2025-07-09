<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasUuid;
use Illuminate\Support\Facades\Storage;

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

    public function base_plan() {
        return $this->belongsTo(Plan::class);
    }
    
    public function contract() {
        return $this->belongsTo(Contract::class);        
    }

    public function getUrlImageAttribute () {
        $default = asset('storage/uploads/pic.svg');

        $extensions = ['jpg', 'jpeg', 'png', 'svg'];

        foreach ($extensions as $ext) {
            $path = "uploads/{$this->id}.{$ext}";
            if (Storage::disk('public')->exists($path)) {
                return asset("storage/{$path}");
            }
        }

        return $default;
    }
}
