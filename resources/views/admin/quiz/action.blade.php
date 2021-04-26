
<div style="font-size:2rem;">
<a href="#" class="btn btn-sm btn-secondary"><i class="fa fa-info fa-fw"></i></a>
<a href="{{route('quizzes.edit',$row->id)}}" class="edit btn btn-primary btn-sm"><i class="fa fa-pen fa-fw"></i></a> 
<a href="{{route('questions.index',$row->id)}}" class="btn btn-sm btn-warning"><i class="fa fa-question fa-fw"></i></a>                
<a href="{{route('quizzes.destroy',$row->id)}}" class="btn btn-sm btn-danger"><i class="fa fa-trash fa-fw"></i></a>  
</div>





                  