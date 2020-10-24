@extends('backend.layouts.master')
@section('backend_content')
    <div class="justify-content-center">
        <h3 class="text-center p-3">
            @if($id == 1)
                Lesson 1
            @elseif($id == 2)
                Lesson 2
            @elseif($id == 3)
                Lesson 3
            @endif
            Questions
        </h3>

        <div class="card">
            <div class="card-body">
                <div class="card">
                    <div class="card-body border border-dark">
                        @foreach($questions as $question)
                            <div class="mb-30 border border-dark p-3">
                                <h4 class="pb-lg-3 text-dark">
                                    <i class="fa fa-volume-up" onclick="togglePlay(this, '{{ $question->id }}')"></i>
                                    <audio class="audio_{{ $question->id }}">
                                        <source src="{{ asset('backend/uploads/files/'.$question->audio) ?? '' }}"
                                                type="audio/mpeg">
                                    </audio>
                                    {{ $question->title }}
                                </h4>
                                <div class="row mt-5">
                                    @foreach($question->options as $option)
                                        @if($option->is_image)
                                            <div class="col-md-2">
                                                <button class="answerOption
                                                        @if($option->answer)
                                                            {{ $option->is_answer == true && $option->answer->is_true == true ? 'border border-3 border-success' : 'border border-3 border-danger'  }}
                                                        @endif"
                                                        data-lesson="{{ $id }}"
                                                        data-question="{{ $question->id }}"
                                                        data-option="{{ $option->id }}">
                                                    <img style="width: 100px; height: 100px"
                                                         src="{{ asset('backend/uploads/options/'.$option->option_image) }}"
                                                         alt="">
                                                </button>
                                            </div>
                                        @else
                                            <button class="ml-2 btn btn-warning answerOption
                                                 @if($option->answer)
                                                    {{ $option->is_answer == true && $option->answer->is_true == true ? 'border border-3 border-success' : 'border border-3 border-danger'  }}
                                                 @endif"
                                                data-lesson="{{ $id }}"
                                                data-question="{{ $question->id }}"
                                                data-option="{{ $option->id }}">
                                                {{ $option->option_text }}
                                            </button>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            <br>
                        @endforeach
                    </div>
                </div>
                <br>
            </div>
        </div>
    </div>

@endsection

@push('script')
    <script type="text/javascript">
        var isPlaying = false;

        function togglePlay(element, id) {

            var myAudio = $(".audio_" + id + "")[0]

            myAudio.onplaying = function () {
                $(element).addClass('text-success')
                isPlaying = true;
            };

            if (isPlaying) {
                myAudio.pause();
            } else {
                myAudio.play();
            }

            myAudio.onpause = function () {
                $(element).removeClass('text-success')
                isPlaying = false;
            };

        };


        // question and answer part
        $(".answerOption").on('click', function () {
            event.preventDefault()
            let lesson_id = $(this).data('lesson')
            let question_id = $(this).data('question')
            let option_id = $(this).data('option')

            let element = $(this)
            $.post("{{ route('answers.store') }}",
                {
                    lesson_id: lesson_id,
                    question_id: question_id,
                    option_id: option_id,
                },
                function (res) {
                    if (res.success) {
                        if (res.answer) {
                            $(element).removeClass('border border-3 border-danger')
                            $(element).addClass('border border-3 border-success')
                        } else {
                            $(element).removeClass('border border-3 border-success')
                            $(element).addClass('border border-3 border-danger')
                        }


                        showAlertMessage(res);
                    }
                    if (!res.success) {
                        showAlertMessage(res);
                    }
                })

        })

        function showAlertMessage(res) {
            swal({
                title: res.title,
                text: res.message,
                type: res.type,
                confirmButtonColor: "#d39e00",
            })
        }

    </script>
@endpush


