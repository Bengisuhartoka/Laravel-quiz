<x-app-layout>
<x-slot name="header">Create Quiz</x-slot>
<div class="card">
    <div class="card-body">
        
        <form method="POST" action=" {{route('quizzes.store')}} ">
        @csrf

                <div class="form-group">
                    <label>Quiz Title</label>
                    <input type="text" name="tittle" class="form-control" required></input>
                </div>
                <div class="form-group">
                    <label>Quiz Description</label>
                <textarea name="description" class="form-control" row="4"></textarea>
                </div>
                <div class="form-group">
                    <input  id="isFinished" type="checkbox">
                    <label>Will there be an end date</label>
                    
                </div>
                <div id="finishedInput" style="display:none" class="form-group">
                    <label>Finished At</label>
                    <input type="datetime-local" name="finished_at" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-sm btn-block">Create Quiz</button>
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