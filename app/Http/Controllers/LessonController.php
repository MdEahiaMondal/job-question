<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function index()
    {
        $lessons = [
            [
                'id' => '1',
                'name' => 'Lesson 1',
                'title' => 'Adding and Subtraction',
            ],
            [
                'id' => '2',
                'name' => 'Lesson 2',
                'title' => 'Addition Computation Through 500',
            ],
            [
                'id' => '3',
                'name' => 'Lesson 3',
                'title' => 'Finding Diffenence',
            ],
        ];

        return view('backend.pages.lessons.index', compact('lessons'));

    }


    public function allQuestion($id){

        $questions = Question::where('lesson_id', $id)->get();
        return view('backend.pages.lessons.questions', compact('questions', 'id'));

    }




}
