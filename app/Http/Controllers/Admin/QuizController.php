<?php

namespace App\Http\Controllers\Admin;
use App\Models\Quiz;
use App\Http\Controllers\Controller;
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
            $data=Quiz::select('*');
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){

                   $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm"><i class="fa fa-pen"></i></a>  ';
                   $btn .= '<button data-rowid="'.$row->id.'" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></button>';
                   return $btn;
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
    public function store(Request $request)
    {
        return $request->post();
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
