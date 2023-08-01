<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Question;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view("front.questions.create", compact("categories", "tags"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "title"=>"required",
            "tags"=>"required",
            "category"=>"required|exists:categories,id",
            "details"=>"nullable",
            "images"=>"nullable|array",
            "images.*"=>"nullable|image",
            "polls"=>"nullable|array",
        ]);


        $slug=Str::slug($request->title,"-");


        $question=Question::create([
            "title"=>$request->title,
            "details"=>$request->details,
            "category_id"=>$request->category,
            "created_by"=>1,
            "slug"=>$slug,
        ]);

        $tags=explode(",",$request->tags);

        $tagIds=[];

        // add tags in tags table if not exists
        foreach($tags as $tag){
            $tag=Tag::firstOrCreate([
                "name"=>$tag,
            ]);
            $tagIds[]=$tag->id;
        }

        $question->tags()->sync($tagIds);

        if($request->hasFile("images")){
            foreach($request->file("images") as $image){
                $question->images()->create([
                    "image"=>$image->store("questions"),
                ]);
            }
        }

        if($request->has("polls")){
            foreach($request->polls as $poll){
                $question->polls()->create([
                    "option"=>$poll,
                ]);
            }
        }

        return redirect()->route("home")->withToastSuccess("Question Created Successfully");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question=Question::with("category","tags","images","polls","answers","answers.replies")->findOrFail($id);

        return view("front.questions.show",compact("question"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
