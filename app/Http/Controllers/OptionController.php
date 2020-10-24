<?php

namespace App\Http\Controllers;

use App\Http\Requests\OptionsRequest;
use App\Option;
use App\Question;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class OptionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(Question $question)
    {
        return view('backend.pages.questions.options.index', compact('question'));
    }


    public function create(Question $question)
    {
        return view('backend.pages.questions.options.create', compact('question'));
    }


    public function store(OptionsRequest $request, Question $question)
    {
        if ($request->file('option_image')) {
            $file = $request->file('option_image');
            $extension = $file->getClientOriginalExtension();

            $name = Carbon::now()->format('Ymd') . '_' . uniqid() . '.' . $extension;

            $file->move(public_path('backend/uploads/options'), $name);

            $request['image'] = $name;
        }

        $question->options()->create([
            'option_text' => $request->option_text,
            'is_image' => $request->is_image == 'on' ? true : false,
            'is_answer' => $request->is_answer == 'on' ? true : false,
            'option_image' => $request->image,
        ]);

        Toastr::success('Question Options created success', 'Success');
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Option $option
     * @return \Illuminate\Http\Response
     */
    public function show(Option $option)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Option $option
     * @return \Illuminate\Http\Response
     */
    public function edit(Option $option)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Option $option
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Option $option)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Option $option
     * @return \Illuminate\Http\Response
     */
    public function destroy(Option $option)
    {
        //
    }
}
