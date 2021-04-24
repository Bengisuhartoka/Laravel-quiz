<x-app-layout>
<x-slot name="header">{{$question->question}} Edit</x-slot>

  
  
<div class="card">
    <div class="card-body">
        
        <form method="POST" action=" {{route('questions.update',[$question->quiz_id,$question->id])}} " enctype="multipart/form-data">
        @method('PUT')
        @csrf

        <div class="form-group">
                    <label>Qestion</label>
                    <textarea name="question" class="form-control" row="4">{{$question->question}}</textarea>
                </div>

                <div class="form-group">
                    <label>İmage</label>
                    @if($question->image)
                    <a href="{{asset($question->image)}}" target="_blank">
                    <img src="{{asset($question->image)}}" class="img-responsive" style="with:200px">
                    </a>
                    @endif
                    <input type="file" name="image" class="form-control">
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label >Answer 1</label>
                            <textarea name="answer1" rows="2" class="form-control">{{$question->answer1}}</textarea>    
                        </div>
                     </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Answer 2</label>
                            <textarea name="answer2" rows="2" class="form-control">{{$question->answer2}}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Answer 3</label>
                            <textarea name="answer3" rows="2" class="form-control">{{$question->answer3}}</textarea>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Answer 4</label>
                            <textarea name="answer4" rows="2" class="form-control">{{$question->answer4}}</textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Correct Answer</label>
                    <select name="correct_answer" class="form-control">
                        <option @if($question->correct_answer==='answer1') selected @endif value="answer1">Answer1</option>
                        <option @if($question->correct_answer==='answer2') selected @endif value="answer2">Answer2</option>
                        <option @if($question->correct_answer==='answer3') selected @endif value="answer3">Answer3</option>
                        <option @if($question->correct_answer==='answer4') selected @endif value="answear4">Answer4</option>
                    </select>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-sm btn-block">Update Qestion</button>
                </div>

        </form>  
    </div>
</div>
</x-app-layout>
