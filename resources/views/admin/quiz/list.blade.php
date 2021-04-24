<x-app-layout>
    <x-slot name="header">Quizs</x-slot>

        <div class="card">
            <div class="card-body">
            <div class="row">
                    <div class="col-md-6 float-left">
                        <a href="{{route('quizzes.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Add Quiz</a>
                    </div>
                    <div class="col-md-6">
                        <a href="{{route('quizzes.trashed')}}" class="btn btn-secondary"  style='float:right'><i class="fa fa-trash-restore" aria-hidden="true"></i></a>
                    </div>
                </div>
                <br>

                <table class="table table-bordered data-table">
                <thead>
                    <tr>
                        <th>tittle</th>
                        <th>Question count</th>
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
    

</x-app-layout>
<script type="text/javascript">
  $(function () {
    
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('quizzes.index') }}",
        columns: [
            {data: 'tittle', name: 'tittle'},
            {data: 'count', name: 'count'},
            {data: 'description', name: 'description'},
            {data: 'finished_at', name: 'finished_at'},
            {
                data: 'status',
                name: 'status',
                orderable: false,
                earchable: false,
                width : "10%",

                render: function(data, type, row, meta) {
                if(data==null){
                    data='';
                }
                let output;
                if(data == "publish"){
                   output = "<br><span class='badge badge-success text-light',>" + data + "</span>"
                }else if(data == "draft"){
                    output = "<br><span class='badge badge-warning text-light',>" + data + "</span>";
                }
                else if(data == "passive"){
                    output = "<br><span class='badge badge-danger text-light',>" + data + "</span>";
                }
                return output;
                }
    },
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
    
  });
</script>