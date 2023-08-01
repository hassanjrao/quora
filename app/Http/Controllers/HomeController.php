<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $questions=Question::with(["category","answers","answers.votes","createdBy","tags","votes"])->latest()->paginate(10);

        return view("front.home",compact("questions"));
    }
}
