<x-app-layout>
    <x-slot name="header">Questions</x-slot>

        <div class="card">
            <div class="card-body">
                <h5 class="card-tittle">Information on the {{$quiz_in->tittle}} quiz</h5>

                <table class="table table-bordered data-table">
                    <thead>
                        <tr>
                            <th>question</th>
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