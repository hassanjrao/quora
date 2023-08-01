<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, "created_by");
    }

    public function votes()
    {
        return $this->hasMany(AnswerVote::class);
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function images()
    {
        return $this->hasMany(AnswerImage::class);
    }
}
