<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dana extends Model
{
    use HasFactory;
    protected $fillable = [
        'pelaksanaan',
        'bahan',
        'Transport',
        'sewa',
    ];

    protected $appends = ['total'];

    public function getTotalAttribute()
    {
    return $this->pelaksanaan+$this->bahan+$this->Transport+$this->sewa;
    }
    public function user()
    {
        return $this->belongsto(User::class);
    }
    public function proposal()
    {
        return $this->belongsto(Proposal::class);
    }
  
}
