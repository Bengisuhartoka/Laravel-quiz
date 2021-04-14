<?php
namespace App\Http\Controllers\Admin;
use App\Models\Question;
use App\Http\Controllers\Controller;
use App\Models\Quiz;
use Illuminate\Http\Request;
use DataTables;
use App\Http\Requests\QuestionCreateRequest;
use App\Http\Requests\QuestionUpdateRequest;
use Illuminate\Support\Str;
class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,$id)
    {   
        
        $quiz_in=Quiz::whereId($id)->with('questions')->first();
        if($request->ajax())
        {
            $quiz=Quiz::find($id)->questions;
            return Datatables::of($quiz)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                return view("admin.question.action",compact('row'));
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        return view('admin.question.list',compact('id','quiz_in'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($quiz_id)
    {
        $quiz=Quiz::find($quiz_id);
        return view('admin.question.create',compact('quiz'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuestionCreateRequest $request,$id)
    { 
        if($request->hasFile('image'))
        {
             $fileName=Str::slug($request->question).'.'.$request->image->extension();
             $fileNamewithUpload='uploads/'.$fileName;
             $request->image->move(public_path('uploads'),$fileName);
             $request->merge([
                 'image'=>$fileNamewithUpload
             ]);
        }
      Quiz::find($id)->questions()->create($request->post());
      return redirect()->route('questions.index',$id)->withSuccess('Question saved successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($quiz_id,$question_id)
    {
        $question = Quiz::find($quiz_id)->questions()->whereId($question_id)->first();
        return view('admin.question.edit',compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $quiz_id,$question_id)    
    {
        
        if($request->hasFile('image'))
        {
             $fileName=Str::slug($request->question).'.'.$request->image->extension();
             $fileNamewithUpload='uploads/'.$fileName;
             $request->image->move(public_path('uploads'),$fileName);
             $request->merge([
                 'image'=>$fileNamewithUpload
             ]);
        }
        Quiz::find($quiz_id)->questions()->whereId($question_id)->first()->update($request->post());
        return redirect()->route('questions.index',$quiz_id)->withSuccess('Question updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($quiz_id,$question_id)
    {
        Quiz::find($quiz_id)->questions()->whereId($question_id)->delete();
        return redirect()->route('questions.index',$quiz_id)->withSuccess('Question Deleted Successfully');
    }
}
