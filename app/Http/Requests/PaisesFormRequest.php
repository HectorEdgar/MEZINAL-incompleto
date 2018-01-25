<?php

namespace practicasUnam\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaisesFormRequest extends FormRequest
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
             'id_pais'=>'required|max:100',
             'nombre'=>'required|max:100'
            //
        ];
    }
}
