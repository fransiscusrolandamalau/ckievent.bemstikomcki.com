<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'title',
        'slug'
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('d, M Y H:i');
    }
}
