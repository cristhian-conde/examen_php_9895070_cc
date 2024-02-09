<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePrestamosRequest extends FormRequest
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
                'libro_id'=>['required'],
                'cliente_id'=>['required'],
                'dias_prestamo'=>['required'],
            ];
        }elseif ($method=='PATCH') {
            return [
                'libro_id'=>['sometimes','required'],
                'cliente_id'=>['sometimes','required'],
                'dias_prestamo'=>['sometimes','required'],
            ];
        }
    }
}
