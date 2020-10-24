@extends('backend.layouts.master')
@section('backend_content')
    <div class="justify-content-center">
        <h3 class="text-center">
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
                                <h4  class="pb-lg-3 text-dark">
                                    <i class="fa fa-volume-up" onclick="togglePlay(this, '{{ $question->id }}')"></i>
                                    <audio class="audio_{{ $question->id }}">
                                        <source src="{{ asset('backend/uploads/files/'.$question->audio) ?? '' }}" type="audio/mpeg">
                                    </audio>
                                    {{ $question->title }}
                                </h4>
                                <div class="row mt-5">
                                    @foreach($question->options as $option)
                                        @if($option->is_image)
                                            <div class="col-md-2">
                                                <button>
                                                    <img style="width: 100px; height: 100px" src="{{ asset('backend/uploads/options/'.$option->option_image) }}" alt="">
                                                </button>
                                            </div>
                                        @else
                                            <div class="col-md-2">
                                                <button class="btn btn-warning">{{ $option->option_text }}</button>
                                            </div>
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
        function togglePlay(element,id) {

          var myAudio =  $(".audio_"+id+"")[0]

            myAudio.onplaying = function() {
                $(element).addClass('text-success')
                isPlaying = true;
            };

            if (isPlaying) {
                myAudio.pause();
            } else {
                myAudio.play();
            }

            myAudio.onpause = function() {
                $(element).removeClass('text-success')
                isPlaying = false;
            };

        };
       /* myAudio.onplaying = function() {
            isPlaying = true;
        };
        myAudio.onpause = function() {
            isPlaying = false;
        };*/
    </script>
@endpush


