<x-app-layout>
    <x-slot name="header">Trash Data</x-slot>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered">
                        <thead>
                                <td><strong>Question</strong></td>
                                <td><strong>Answer1</strong></td>
                                <td><strong>Answer2</strong></td>
                                <td><strong>Answer3</strong></td>
                                <td><strong>Answer4</strong></td>
                                <td><strong>Correct Amswer</strong></td>
                                <td><strong>Action</strong></td>

                        </thead>
                        <tbody>
                        @foreach($tarshed_data as $value)
                            <tr>
                                <td>{{$value->question}} </td>
                                <td>{{$value->answer1}} </td>
                                <td>{{$value->answer2}} </td>
                                <td>{{$value->answer3}} </td>
                                <td>{{$value->answer4}} </td>
                                <td>{{$value->correct_answer}} </td>
                                <td> 
                                <a href="{{route('question.restore', $value->id)}}" class="btn btn-danger">Restore</a>
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