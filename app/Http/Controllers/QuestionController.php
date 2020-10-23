<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuestionRequest;
use App\Question;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;


class QuestionController extends Controller
{

    public function index()
    {
        $questions = Question::with('createdUser', 'updatedUser')->paginate(10);
        return view('backend.pages.questions.index', compact('questions'));
    }


    public function create()
    {
        return view('backend.pages.questions.create');
    }


    public function store(QuestionRequest $request)
    {
        $request['lesson_id'] = $request->lesson;

        $onlyGo = $request->only(['lesson_id', 'title', 'question_details']);

        $question = Question::create($onlyGo);

        if ($question) {
            if ($request->file('audio_file')) {
                $file = $request->file('audio_file');
                $extension = $file->getClientOriginalExtension();

                $name = Carbon::now()->format('Ymd') . '_' . uniqid() . '.' . $extension;

                $file->move(public_path('backend/uploads/files'), $name);

                $question->audio = $name;

                $question->save();
            }
            Toastr::success('Question created success', 'Success');
            return redirect()->back();
        }
    }


    public function show($id)
    {
        //
    }


    public function edit(Question $question)
    {
        return view('backend.pages.questions.edit', compact('question'));
    }


    public function update(QuestionRequest $request, Question $question)
    {
        if ($request->file('audio_file')) {
            $file = $request->file('audio_file');
            $extension = $file->getClientOriginalExtension();

            $name = Carbon::now()->format('Ymd') . '_' . uniqid() . '.' . $extension;

            $file->move(public_path('backend/uploads/files'), $name);

            $request['audio'] = $name;

            if (file_exists('backend/uploads/files/'.$question->audio)){
                unlink('backend/uploads/files/'.$question->audio);
            }
        }else{
            $request['audio'] = $question->audio;
        }

        $request['lesson_id'] = $request->lesson;

        $onlyGo = $request->only(['lesson_id', 'title', 'question_details', 'audio']);

        $question = $question->update($onlyGo);

        if ($question) {
            Toastr::success('Question update successfully', 'Success');
            return redirect()->route('questions.index');
        }
    }


    public function destroy(Question $question)
    {
        if (file_exists('backend/uploads/files/'.$question->audio)){
            unlink('backend/uploads/files/'.$question->audio);
        }
        $question->delete();

        Toastr::success('Question delete successfully', 'Success');
        return redirect()->back();
    }


    public function statusChange(Question $question)
    {
        if ($question) {

            $question->status = !$question->status;
            $question->save();

            Toastr::success('Status change successfully', 'Success');
            return redirect()->back();
        } else {
            Toastr::warning('The Identifier is wrong.. please try again', 'Warning');
            return redirect()->back();
        }
    }

}
