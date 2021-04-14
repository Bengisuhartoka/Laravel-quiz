<x-app-layout>
    <x-slot name="header">Questions</x-slot>

        <div class="card">
            <div class="card-body">
                  Information on the {{$quiz_in->tittle}} quiz
                  <h5 class="card-tittle float-right"> 
                    <a href="{{route('quizzes.index')}}" class="btn btn-warning"><i class="fa fa-arrow-left"></i></a>
                </h5>
                <h5 class="card-tittle">
                    <a href="{{route('questions.create',$id)}}" class="btn btn-primary"><i class="fa fa-plus"></i> Add Question</a>
                </h5>
                

                <table class="table table-bordered data-table">
                    <thead>
                        <tr>
                            <th>question</th>
                            <th>image</th>
                            <th>answer1</th>
                            <th>answer2</th>
                            <th>answer3</th>
                            <th>answer4</th>
                            <th>correct answer</th>
                            <th width="100px">Action</th>
                        </tr>
                    </thead>
                <tbody>
               </tbody>
            </table>
        </div>
            
            </div>


</x-app-layout>
<script type="text/javascript">

  $(function () {
    
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('questions.index',$id) }}",
        columns: [
            {data: 'question', name: 'question'},
            {data: 'image', name: 'image'},
            {data: 'answer1', name: 'answer1'},
            {data: 'answer2', name: 'answer2'},
            {data: 'answer3', name: 'answer3'},
            {data: 'answer4', name: 'answer4'},
            {data: 'correct_answer', name: 'correct_answer'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
    
  });
</script>