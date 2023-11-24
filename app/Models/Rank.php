<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rank extends Model
{
    use HasFactory;
    protected $fillables = ['user_id', 'point'] ;
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
