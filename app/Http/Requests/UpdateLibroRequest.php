<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLibroRequest extends FormRequest
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
        $method = $this->method();
        if($method=='PUT'){
            return [
                'titulo'=>['required'],
                'autor_id'=>['required'],
                'lote'=>['required'],
                'description'=>['required']
            ];
        }elseif ($method=='PATCH') {
            return [
                'titulo'=>['sometimes','required'],
                'autor_id'=>['sometimes','required'],
                'lote'=>['sometimes','required'],
                'description'=>['sometimes','required']
            ];
        }
    }
}
