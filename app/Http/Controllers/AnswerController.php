<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Option;
use App\Question;
use Illuminate\Http\Request;

class AnswerController extends Controller
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
        //
    }


    public function store(Request $request)
    {
        $lesson_id = $request->lesson_id;
        $question_id = $request->question_id;
        $option_id = $request->option_id;

        //you can check validity
        $question = Question::find($question_id);
        $option = Option::where(['question_id' => $question_id, 'id' => $option_id])->first();

        if ($question && $option){

            // check answer already exist or not
            $check_ans = Answer::where([
                'user_id' => Auth()->id(),
                'lesson_id' => $lesson_id,
                'question_id' => $question_id,
            ])->first();

            if ($check_ans){
                return response()->json([
                    'success' => false,
                    'type' => 'warning',
                    'title' => 'Submitted',
                    'message' => 'Hey!. You already submitted your answer'
                ]);
            }

            $answer = Answer::create([
                'user_id' => Auth()->id(),
                'lesson_id' => $lesson_id,
                'question_id' => $question_id,
                'option_id' => $option_id,
                'is_true' => $option->is_answer ?? false,
            ]);

            if ($answer){
                $meesage = $option->is_answer == true ? 'Your answer is absolutely right' : 'Oops! Your answer is wrong!';
                return response()->json([
                    'success' => true,
                    'type' => 'success',
                    'title' => 'Answered',
                    'answer' => $option->is_answer ?? false,
                    'message' => $meesage
                ]);
            }
        }else{
            return response()->json([
                'success' => false,
                'type' => 'success',
                'title' => 'Wrong',
                'message' => 'Something is wrong! Please try again later'
            ]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function show(Answer $answer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function edit(Answer $answer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Answer $answer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Answer $answer)
    {
        //
    }
}
