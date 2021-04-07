<?php

namespace App\Http\Controllers\Admin;
use App\Models\Quiz;
use App\Http\Controllers\Controller;
use App\Http\Requests\QuizCreateRequest;
use App\Http\Requests\QuizUpdateRequest;
use Illuminate\Http\Request;
use DataTables;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $data = Quiz::all();
        // return datatables()->of($data)->toJson();
        
        if($request->ajax())
        {
            $data=Quiz::all();
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                return view("admin.quiz.action",compact('row'));

            })
            ->rawColumns(['action'])
            ->make(true);
        }
        
        return view('admin.quiz.list');
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.quiz.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuizCreateRequest $request)
    {
        $data = new Quiz;
        $data->tittle=$request->tittle;
        $data->description=$request->description;
        $data->finished_at=$request->finished_at;
        $data->save();
        
        return redirect()->route('quizzes.index')->withSuccess('Quiz is created');

        // return $request->post();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $quiz=Quiz::find($id) ?? abort(404,'Not Found Quiz');
        return view('admin.quiz.edit',compact('quiz'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(QuizUpdateRequest $request, $id)
    {
        $quiz=Quiz::find($id) ?? abort(404,'Quiz is not found');
        Quiz::where('id',$id)->update($request->except(['_method','_token']));

        return redirect()->route('quizzes.index')->withSuccess('Quiz Update!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $quiz = Quiz::find($id) ?? abort(404,'Quiz Bulunamadı');
        $quiz->delete();
        return redirect()->route('quizzes.index')->withSuccess('Quiz is Deleted');
    }
}
