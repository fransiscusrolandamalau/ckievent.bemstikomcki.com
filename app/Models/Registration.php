<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $fillable = [
        'event_id',
        'full_name',
        'email',
        'phone_number',
        'event_name',
        'status',
        'instansi',
        'nim',
        'kelas',
        'semester',
        'info',
        'payment_confirmation',
        'payment_upload',
    ];

    public function posts()
    {
        return $this->hasOne('App\Models\Post', 'id', 'event_id');
    }
}
