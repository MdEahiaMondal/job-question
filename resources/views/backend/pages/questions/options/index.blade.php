@extends('backend.layouts.master')
@section('backend_content')
    <div class="justify-content-center">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><a href="{{ route('questions.options.create', $question->slug) }}" class="float-right btn btn-warning"><i class="fa fa-plus"></i> Create</a></div>

                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">SI</th>
                                <th scope="col">Option Text</th>
                                <th scope="col">Option Image</th>
                                <th scope="col">Answer</th>
                                <th scope="col">Created By</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($question->options as $key=>$option)
                                <tr>
                                    <th scope="row">{{ ++$key }}</th>
                                    <td>{{ ucfirst(@$option->option_text) }}</td>
                                    <td>
                                        <img width="100" src="{{ asset('backend/uploads/options/'.$option->option_image) }}" alt="">
                                    </td>
                                    <td>
                                        @if($option->is_answer)
                                            <span class="badge badge-success">Yes</span>
                                        @else
                                            <span class="badge badge-danger">No</span>
                                        @endif
                                    </td>

                                    <td>{{ ucfirst(@$option->createdUser->name) }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
