@extends('backend.layouts.master')
@section('backend_content')
    <div class="justify-content-center">
        <h3 class="text-center">Learning lesson wise</h3>

        <div class="card">
            <div class="card-body">

                @foreach($lessons as $le)
                    <div class="card">
                        <div class="card-body border border-dark">
                            <a href="{{ route('all.lesson.question', $le['id']) }}">
                                <div class="single-question mb-30">
                                    <div class="row">
                                        <div class="col-sm-12 col-12">
                                            <div class="pb-lg-5">
                                                <strong class="pb-lg-3 text-dark">{{ $le['name'] }}: {{ $le['title'] }}</strong>
                                                <span class="items-link float-right border border-dark p-1 bg-dark text-warning">
                                                    <i class="fa fa-tv"></i>  Computer
                                                </span>
                                            </div>
                                            <p>Quiz:<span class="text-dark"> Mastered</span>
                                                <span class="items-link float-right border border-dark p-1 bg-dark text-warning">
                                                    <i class="fa fa-signal"></i>  Online
                                                </span>
                                            </p>

                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <br>
                @endforeach
            </div>
        </div>
    </div>

@endsection
@push('script')

@endpush
