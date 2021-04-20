<?php

namespace App\Http\Controllers;
use App\Models\Quiz;
use App\Models\Answer;

use App\Models\Result;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function dashboard(){
        
        $quizzes=Quiz::where('status','publish')->withCount('questions')->paginate(5);
        return view('dashboard',compact('quizzes'));
    }
    public function quiz($slug){
        $quiz=Quiz::whereSlug($slug)->with('questions')->first();
        return view('quiz',compact('quiz'));
    }
    public function quiz_detail($slug){
        $quiz=Quiz::whereSlug($slug)->with('my_result','topten.user')->withCount('questions')->first() ?? abort(404,'Quiz not found');
        return view('quiz_detail',compact('quiz'));
    }
    public function result(Request $request,$slug){
       $quiz=Quiz::with('questions')->whereSlug($slug)->first() ?? abort(404,'Quiz not Found');
       $correct_count=0;
       if($quiz->my_result)
       {
           abort(404,"You have join in this quiz before");
       }
       foreach($quiz->questions as $question)
       {
          
           Answer::create([
               'user_id'=>auth()->user()->id,
               'question_id'=>$question->id,
               'answer'=>$request->post($question->id)

           ]);
        //    echo $question->id.' - '.$question->correct_answer.' / '.$request->post($question->id).'<br>';

           if($question->correct_answer===$request->post($question->id))
           {
               $correct_count+=1;
           }

       }
        $point= round((100/count($quiz->questions))*$correct_count);
        $wrong = count($quiz->questions)-$correct_count;
   
       Result::create([
           'user_id'=>auth()->user()->id,
           'quiz_id'=>$quiz->id,
           'point'=>$point,
           'correct'=>$correct_count,
           'wrong'=>$wrong

       ]);

    return redirect()->route('quiz.detail',$quiz->slug)->withSuccess("You have successfuly finished the Quiz. Your Score: ".$point);

    }
}