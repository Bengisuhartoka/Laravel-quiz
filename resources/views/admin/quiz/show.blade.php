<x-app-layout>
    <x-slot name="header">{{$quiz->tittle}}</x-slot>
    <div class="card">
        <div class="card-body">
            <p class="card-text">
                <div class="row">
                    <div class="col-md-4">
                        <ul class="list-group">
                          
                            @if($quiz->finished_at)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                Due Date
                                    <span title="{{$quiz->finished_at}}" class="badge badge-secondary  badge-pill">{{$quiz->finished_at->diffForHumans()}}</span>
                                </li>
                            @endif
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Question Count
                                <span class="badge badge-secondary  badge-pill">{{$quiz->questions_count}}</span>
                            </li>
                            @if($quiz->details)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Join Count
                                    <span class="badge badge-warning  badge-pill">{{$quiz->details['join_count']}}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Avarage Score
                                    <span class="badge badge-secondary  badge-pill">{{$quiz->details['average']}}</span>
                                </li>
                            @endif
            
                        </ul>
                        @if(count($quiz->topten)>0)
                        <div class="card mt-3">
                            <div class="card-body">
                                <h5 class="card-tittle">Top 10</h5>
                                <ul class="list-group">
                                   @foreach($quiz->topten as $result)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">

                                        <strong class="h5">{{$loop->iteration}}</strong>
                                        
                                        <span @if(auth()->user()->id==$result->user_id) class="text-danger" @endif>{{$result->user->name}}</span>
                                        <span class="badge badge-success  badge-pill">{{$result->point}}</span>
                                        <img class="w-8 h-8 rounded-full" src="{{$result->user->profile_photo_url}}">
                                    </li>
                                    
                                   @endforeach
                                   
                                </ul>
                            </div>
                        </div>
                        @endif


                    </div>
                    <div class="col-md-8">
                    {{$quiz->description}}
                    <table class="table table-striped mt-3">
                        <thead>
                            <tr>
                            <th scope="col">Name Surname</th>
                            <th scope="col">Score</th>
                            <th scope="col">Correct Count</th>
                            <th scope="col">Wrong Count</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($quiz->result as $result)
                            <tr>
                            <td>{{$result->user->name}}</td>
                            <td>{{$result->point}}</td>
                            <td>{{$result->correct}}</td>
                            <td>{{$result->wrong}}</td>
                            </tr>
                            
                            @endforeach
                        </tbody>
                    </table>
            </p>
                   
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
