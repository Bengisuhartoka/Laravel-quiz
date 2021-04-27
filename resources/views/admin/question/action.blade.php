<!--İki parametre laması lazım quiz id ve question id  -->
<div style="font-size:2rem;">
<a href="{{route('questions.edit',[$row->quiz_id,$row->id])}}" class="edit btn btn-primary btn-sm"><i class="fa fa-pen"></i></a>           
<a href="{{route('questions.destroy',[$row->quiz_id,$row->id])}}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>  
<a href="#" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a>  

