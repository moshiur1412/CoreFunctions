<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use App\Http\Requests\StoreQuestionPost;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        \Log::info('Req=QuestionController@index Called');
        
        $questions = Question::with('user')->latest()->paginate(5);
     
        return view('questions.index', compact('questions'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        \Log::info('Req=QuestionController@crate Called');

        $question = new Question();
        
        return view('questions.create', compact('question'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreQuestionPost $request)
    {
        \Log::info('Req=QuestionController@store called');
        
        $request->user()->questions()->create($request->only('title', 'body'));
        
        return redirect()->route('questions.index')->with('success','Your question has been published.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        \Log::info('Req=QuestionController@show Called');

        $question->increment('views');

        return view('questions.show', compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        \Log::info('Req=QuestionControler@edit Called');
        if(\Gate::allows('update-question', $question)){
            return view('questions.create', compact('question'));
        }
        return abort(404);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(StoreQuestionPost $request, Question $question)
    {
       \Log::info('Req=QuestionControler@update Called');
        
       
       $question->update($request->only('title', 'body'));

        return redirect()->route('questions.index')->with('success', 'Your question has been update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        
        \Log::info('Req=QuestionController@destroy Called');

        $question->delete();

        return redirect()->route('questions.index')->with('success', 'Your quesiton has been deleted successfully.');
    }
}
