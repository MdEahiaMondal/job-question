@extends('backend.layouts.master')
@section('backend_content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><a href="{{ route('questions.index') }}" class="float-right btn btn-warning"><i class="fa fa-arrow-circle-left"></i> Back</a></div>
                <div class="card-body">
                    <form method="post" enctype="multipart/form-data" action="{{ route('questions.update', $question->slug) }}">
                        @csrf
                        @method('put')

                        @include('backend.pages.questions.element')
                        <button class="btn btn-warning">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
