<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'file',
        'category_id',
        'status_id',
        'user_id',
    ];

    protected $appends = ['pengaju', 'reviewer','name'];
    public function user()
    {
        return $this->belongsto(User::class,'user_id','id');
    }




    /**
     * The roles that belong to the Proposal
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */

   

 
    public function getpengajuAttribute()
    {
        return $this->User::where('id', $this->pengaju_id)->first();
    }
    public function getreviewerAttribute()
    {
        return $this->User::where('id', $this->reviewer_id)->first();
    }
}
