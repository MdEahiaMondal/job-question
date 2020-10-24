@extends('backend.layouts.master')
@section('backend_content')
    <div class="justify-content-center">
        <div class="card">
            <div class="card-header"><a href="{{ route('questions.options.index', $question->slug) }}"
                                        class="float-right btn btn-warning"><i class="fa fa-arrow-circle-left"></i> Back</a>
            </div>
            <div class="card-body">
                <form enctype="multipart/form-data" action="{{ route('questions.options.store', $question->slug) }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 offset-md-3">
                            <div class="card p-3">
                                <div class="form-group">
                                    <label for="option">Text</label>
                                    <input type="text" name="option_text" value="{{ old('option_text') }}"
                                           class="form-control" id="option">
                                    @error('option_text')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Image</label>
                                    <div class="custom-file">
                                        <input type="file" accept="image/*" name="option_image"
                                               class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">Choose Image</label>
                                    </div>
                                    @error('option_image')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    Do you show Image ? <input type="checkbox" {{ old('is_image') ? 'checked' : '' }} name="is_image">
                                    @error('is_image')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    Is it correct Answer ? <input type="checkbox" {{ old('is_answer') ? 'checked' : '' }} name="is_answer">
                                    @error('is_answer')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-warning mt-3">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
