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
                                    <span title="{{$quiz->finished_at}}" class="badge badge-success  badge-pill">{{$quiz->finished_at->diffForHumans()}}</span>
                                </li>
                            @endif
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Question Count
                                <span class="badge badge-success  badge-pill">{{$quiz->questions_count}}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Participator Count
                                <span class="badge badge-success  badge-pill">14</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Avarage Score
                                <span class="badge badge-success  badge-pill">2</span>
                            </li>
            
                        </ul>
                    </div>
                    <div class="col-md-8">
                    {{$quiz->description}}
            </p>
                    <a href="#" class="float-right btn btn-primary btn-sm">take the quiz</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
