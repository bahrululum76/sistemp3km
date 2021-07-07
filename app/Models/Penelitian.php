<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penelitian extends Model
{
    use HasFactory;
    protected $fillable = [
        'judul',
        'pendanaan',
        'publikasi',
        'tahun',
        'url',
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
