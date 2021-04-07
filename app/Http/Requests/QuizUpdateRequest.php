<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuizUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'tittle'=>'required|min:3|max:200',
            'descripton'=>'max:512',
            'finished_at'=>'nullable|after:'.now(),
        ];
    }
    public function attributes(){
        return[
            'tittle'=>'Quiz Title',
            'description'=>'Quiz Description',
            'finished_at'=>'Finished At',


        ];
    }
}
