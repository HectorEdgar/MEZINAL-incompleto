<?php

namespace practicasUnam\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocumentoFormRequest extends FormRequest
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

        'titulo' => 'required|max:600',
        'lugar_public_pais' => 'required|max:50',
        'lugar_public_edo'=> 'required|max:50',
        'derecho_autor' => 'required|integer|between:0,1 ',
        'fecha_publi'  => 'nullable|max:2',
        'url'   => 'required|max:600',
        'investigador' => 'required|max:50',
        'fecha_consulta' => 'required|date',
        'poblacion'  => 'required|integer',
        'tipo' => 'required|max:5',
        'notas'  => 'nullable|max:700', 
        'fecha_registro' => 'required|date',
        'revisado' => 'required|integer|between:0,1 ',
        'linea'  => 'required|integer'
        ];
    }
}
