<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name', 'slug'];

    public function events()
    {
        return $this->belongsToMany(Event::class);
    }
}
