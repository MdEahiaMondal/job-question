<div class="col-sm-12">
    <div class="form-group">
        <label for="lesson_id">Select Lesson</label>
        <select name="lesson" class="form-control" required id="lesson_id">
            <option selected value="">Chose lesson</option>
            <option {{ isset($question) && $question->lesson_id == 1 ? 'selected' : ''  }} value="1">Lesson 1</option>
            <option {{ isset($question) && $question->lesson_id == 2 ? 'selected' : ''  }} value="2">Lesson 2</option>
            <option {{ isset($question) && $question->lesson_id == 3 ? 'selected' : ''  }} value="3">Lesson 3</option>
        </select>
        @error('lesson_id')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" value="{{ isset($question->title) ? $question->title : old('title')}}" class="form-control" id="title" required>
        @error('title')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="question_details">Details</label>
        <textarea name="question_details" id="question_details" class="form-control">
            {{ isset($question->question_details) ? $question->question_details : old('question_details') }}
        </textarea>
        @error('question_details')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="">Audio</label>
        <div class="custom-file">
            <input type="file" accept="audio/*" name="audio_file" class="custom-file-input" id="customFile">
            <label class="custom-file-label" for="customFile">Choose Audio</label>
        </div>
        @error('audio_file')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
</div>
