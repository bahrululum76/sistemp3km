<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengabdian extends Model
{
    use HasFactory;
    protected $fillable = [
        'judul',
        'dipublikasikan_pada',
        'tahun_publikasi',
        'file',
        'user_id',
    ];   


    protected $appends = ['pengaju'];
    public function user()
    {
        return $this->belongsto(User::class);
    }

    public function getpengajuAttribute()
    {
        return $this->User::where('id', $this->user_id)->first();
    }
}
