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
        'banner',
        'nama_event',
        'slug',
        'tanggal_mulai',
        'tanggal_berakhir',
        'mulai_jam',
        'selesai_jam',
        'lokasi',
        'nama_tempat',
        'url_maps',
        'url_streaming',
        'kategori_tiket',
        'nama_tiket',
        'jumlah_tiket',
        'harga',
        'tanggal_mulai_penjualan',
        'tanggal_berakhir_penjualan',
        'mulai_jam_penjualan',
        'selesai_jam_penjualan',
        'deskripsi_event',
        'syarat_ketentuan',
        'featured',
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

    public function getTakeImageAttribute()
    {
        return '/storage/' . $this->thumbnail;
    }
}
