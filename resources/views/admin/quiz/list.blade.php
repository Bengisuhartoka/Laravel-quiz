<x-app-layout>
    <x-slot name="header">Quizler</x-slot>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h5 class="card-tittle"> 
                    <a href="{{route('quizzes.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Add Quiz</a>
                </h5>

                <table class="table table-bordered data-table">
                <thead>
                    <tr>
                        <th>tittle</th>
                        <th>description</th>
                        <th>finished_at</th>
                        <th>status</th>
                        <th width="100px">Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
                </table>
                </div>
            
            </div>
        </div>

</x-app-layout>
<script type="text/javascript">
  $(function () {
    
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('quizzes.index') }}",
        columns: [
            {data: 'tittle', name: 'tittle'},
            {data: 'description', name: 'description'},
            {data: 'finished_at', name: 'finished_at'},
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
    
  });
</script>