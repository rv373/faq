<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Tag;
use Illuminate\Support\Facades\Auth;


class QuestionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
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
        //echo($tags);
        $question = new Question;
        $tags = Tag::all();

        $edit = FALSE;
        return view('questionForm', ['question' => $question,'edit' => $edit  ])->withTags($tags);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $input = $request->validate([
            'body' => 'required|min:5',
        ], [
            'body.required' => 'Body is required',
            'body.min' => 'Body must be at least 5 characters',
        ]);
        $tags = Tag::all();
        $input = request()->all();
        $question = new Question($input);
        $question->user()->associate(Auth::user());
        $question->save();
        $question->tags()->sync($request->tags,false);
        return redirect()->route('home')->with('message', 'IT WORKS!');
        // return redirect()->route('questions.show', ['id' => $question->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        $tags = Tag::all();
        $tagst = array();
        foreach ($tags as $tag) {
            $tagst[$tag->id] = $tag->name;
        }
        return view('question')->with('question', $question)->withTags($tagst);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        $edit = TRUE;
        $tags = Tag::all();
        $tagst = array();
        foreach ($tags as $tag) {
            $tagst[$tag->id] = $tag->name;
        }
        return view('questionForm', ['question' => $question, 'edit' => $edit ])->withTags($tagst);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        $input = $request->validate([
            'body' => 'required|min:5',
        ], [
            'body.required' => 'Body is required',
            'body.min' => 'Body must be at least 5 characters',
        ]);
        $tags = Tag::all();
        //dd($tags);
        $tagst = array();
        foreach ($tags as $tag) {
            $tagst[$tag->id] = $tag->name;
        }
        $question->body = $request->body;
        $question->save();
        $question->tags()->sync($request->tags,true);
        return redirect()->route('questions.show',['question_id' => $question->id])->with('message', 'Saved')->withTags($tagst);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        $tags = Tag::all();
        $tags->delete();
        $question->delete();
        return redirect()->route('home')->with('message', 'Deleted')->withTags($tags);
    }
}
