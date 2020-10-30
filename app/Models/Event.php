<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'event_title',
        'slug',
        'location',
        'event_start',
        'start_time',
        'event_ends',
        'end_time',
        'thumbnail',
        'description',
        'terms_and_conditions',
        'contact_person',
        'payment_status',
        'event_status',
        'path_to',
        'is_published',
        'featured',
        'meta_title',
        'meta_description',
    ];

    protected $with = ['author'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function registration()
    {
        return $this->hasOne('App\Models\Registration', 'event_id', 'id');
    }
}
