<x-app-layout>
<x-slot name="header">Edit Quiz</x-slot>

  
  
<div class="card">
    <div class="card-body">
        
        <form method="POST" action=" {{route('quizzes.update',$quiz->id)}} ">
        @method('PUT')
        @csrf

                <div class="form-group">
                    <label>Quiz Title</label>
                    <input type="text" name="tittle" class="form-control" value="{{$quiz->tittle}}"></input>
                </div>
                <div class="form-group">
                    <label>Quiz Description</label>
                <textarea name="description" class="form-control" row="4">{{$quiz->description}}</textarea>
                </div>
                <div class="form-group">
                    <input  id="isFinished"  @if($quiz->finished_at) checked @endif type="checkbox"> 
                    <label>Will there be an end date?</label>
                </div>
                <div id="finishedInput"  @if(!$quiz->finished_at) style="display:none" @endif  class="form-group">
                    <label>Finished At</label>
                    <input type="datetime-local" name="finished_at" class="form-control" @if($quiz->finished_at) value="{{ date('Y-m-d\TH:i', strtotime($quiz->finished_at))}}"  @endif>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-sm btn-block">Update Quiz</button>
                </div>


        </form>  
    </div>
</div>
<x-slot name="js">
    <script>
    $('#isFinished').change(function(){
        if($('#isFinished').is(':checked'))
        {
            $('#finishedInput').show();
        }
        else
        {
            $('#finishedInput').hide();

        }
  
    })

    </script>

</x-slot>


</x-app-layout>