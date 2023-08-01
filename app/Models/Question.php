<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function answers(){
        return $this->hasMany(Answer::class);
    }


    public function createdBy(){
        return $this->belongsTo(User::class, "created_by");
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    public function votes(){
        return $this->hasMany(QuestionVote::class);
    }

    public function images(){
        return $this->hasMany(QuestionImage::class);
    }

    public function polls(){
        return $this->hasMany(QuestionPoll::class);
    }


}
