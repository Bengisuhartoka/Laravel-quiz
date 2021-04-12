<x-app-layout>
<x-slot name="header">{{$quiz->tittle}}Create Question</x-slot>

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{route('questions.store',$quiz->id)}}" enctype="multipart/form-data">
            @csrf
                <div class="form-group">
                    <label>Qestion</label>
                    <textarea name="question" class="form-control" row="4">{{old('question')}}</textarea>
                </div>

                <div class="form-group">
                    <label>İmage</label>
                    <input type="file" name="image" class="form-control">
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label >Answer 1</label>
                            <textarea name="answer1" rows="2" class="form-control">{{old('answer1')}}</textarea>    
                        </div>
                     </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Answer 2</label>
                            <textarea name="answer2" rows="2" class="form-control">{{old('answer2')}}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Answer 3</label>
                            <textarea name="answer3" rows="2" class="form-control">{{old('answer3')}}</textarea>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Answer 4</label>
                            <textarea name="answer4" rows="2" class="form-control">{{old('answer4')}}</textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Correct Answer</label>
                    <select name="correct_answer" class="form-control">
                        <option @if(old('correct_answer')==='answer1') selected @endif value="answer1">Answer1</option>
                        <option @if(old('correct_answer')==='answer2') selected @endif value="answer2">Answer2</option>
                        <option @if(old('correct_answer')==='answer3') selected @endif value="answer3">Answer3</option>
                        <option @if(old('correct_Answer')==='answer4') selected @endif value="answer4">Answer4</option>
                    </select>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-sm btn-block">Create Qestion</button>
                </div>
            </form>

        </div>
    </div>
</x-app-layout>
