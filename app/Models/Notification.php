<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasUuid;

class Notification extends Model
{
    use HasUuid;

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    const UUID = 'id';

    protected $table = 'notifications';

    protected $fillable = [
        'id',
        'user_id',
        'title',
        'description',
        'body'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
