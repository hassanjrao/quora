<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function answer()
    {
        return $this->belongsTo(Answer::class);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class,"created_by");
    }
}
