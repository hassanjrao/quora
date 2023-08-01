<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionPoll extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function pollResults()
    {
        return $this->belongsToMany(User::class,"poll_result","poll_id","user_id");
    }

    

}
