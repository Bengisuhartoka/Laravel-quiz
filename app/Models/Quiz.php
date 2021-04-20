<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable; // Slug eklemek için
class Quiz extends Model
{
    use HasFactory;
    use Sluggable;
    
    protected $table="quizzes";
    protected $fillable=["tittle","description","finished_at","status","slug"];

    protected $dates=['finished_at'];
    protected $appends=['details','my_rank'];

    public function getMyRankAttribute(){
        $rank=0;
        foreach($this->result()->orderByDesc('point')->get() as $result)
        {
            $rank+=1;
            if(auth()->user()->id==$result->user_id)
            {
                return $rank;
            }

        }
    }


 

    public function getDetailsAttribute(){

        if($this->result()->count()>0){ 
        
            return [
            'average'=>round($this->result()->avg('point')),
            'join_count'=>$this->result()->count()
        ];
        }
        return null;

    }

    public function getFinishedAtAttribute($date)
    {
        return $date ? Carbon::parse($date):null;
    }
    public function result()
    {
        return $this->hasMany('App\Models\Result');
    }
    public function my_result(){
        return $this->hasOne('App\Models\Result')->where('user_id',auth()->user()->id);
    }
    public function questions()
    {
        return $this->hasMany('App\Models\Question');
    }

    public function topten(){
        return $this->result()->orderByDesc('point')->take(10);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
            'onUpdate' => true,
            'source' => 'tittle'
            ]
        ];
    }
   
}
