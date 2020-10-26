<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use App\Models\Registration;

class Post extends Model
{
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'author_id',
		'event_title',
		'slug',
		'tag',
		'location',
		'event_start',
		'start_time',
		'event_ends',
		'end_time',
		'thumbnail',
		'content',
		'contact',
		'payment_status',
		'event_status',
		'path_to',
		'is_published'
	];

	public function author()
	{
		return $this->belongsTo('App\Models\User', 'author_id');
	}

	public function tag()
	{
		return $this->belongsToMany(Tag::class, 'event_pivot');
	}

	protected function serializeDate(DateTimeInterface $date)
	{
		return $date->format('d, M Y H:i');
    }

    public function registration()
    {
        return $this->hasOne('App\Models\Registration', 'event_id', 'id');
    }
}
