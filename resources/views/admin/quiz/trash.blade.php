<x-app-layout>
    <x-slot name="header">Trash Data</x-slot>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered">
                        <thead>
                                <td><strong>Tittle</strong></td>
                                <td><strong>Description</strong></td>
                                <td><strong>Finished At</strong></td>
                                <td><strong>Action</strong></td>
                        </thead>
                        <tbody>
                        @foreach($trashed_data as $value)
                            <tr>
                                <td>{{$value->tittle}} </td>
                                <td>{{$value->description}} </td>
                                <td>{{$value->finished_at}} </td>
                                <td> 
                                <a href="{{route('quizzes.restore', $value->id)}}" class="btn btn-danger">Restore</a>
                                </td>
                            </tr>
                        @endforeach
                        
                        
                        
                        
                        </tbody>


                    </table>
                
                
                </div>
            </div>
        
        </div>
    </div>
     
</x-app-layout>