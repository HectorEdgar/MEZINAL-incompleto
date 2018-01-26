<?php

namespace practicasUnam\Http\Controllers;

use Illuminate\Http\Request;

use practicasUnam\Http\Requests;
use practicasUnam\Editor;
use Illuminate\Support\Facades\Redirect;
use practicasUnam\Http\Requests\EditorFormRequest;
use DB;

use practicasUnam\Http\Controllers\Controller;

class EditorController extends Controller
{
    //
    //CONSTRUCTOR
	public function __construct()
	{
		//si no esta logeado regresa al login
        //ES COMO EL PINCHE SPRING SECURITY :v
        $this->middleware('auth');
	}

	//FUNCION INDEX
	public function index(Request $request)
	{
		//SI EXISTE OBJETO REQUEST
		if($request)
		{
			//FILTRO DE BUSQUEDA
			//OBTENER TODOS LOS REGISTROS DE LA TABLA EDITOR
			//TEXTO A BUSCAR
            $query=trim($request->get('searchText'));
			//SE REALIZA LA BUSQUEDA
			$editores=DB::table('editor')
			->where('editor','LIKE','%'.$query.'%')
			->orderBy('id_editor','desc')
			->paginate(7);
			return view('editor.index',["editores"=>$editores,"searchText"=>$query]);
		}
	}


	public function create()
	{

		return view("editor.create");
	}

	public function store(EditorFormRequest $request)
	{

		$editor=new Editor;
		$editor->id_editor=$request->get('id_editor');
		$editor->editor=$request->get('editor');
		$editor->save();

		return Redirect::to('editor');
	}

	//BUSQUEDA DE DE UN SOLO REGISTRO
	//PARAMETRO ID DEl editor A BUSCAR
	public function show($id)
	{

		return view("editor.show",["editor"=>Editor::findOrFail($id)]);
	}

	//modificar los campos de l editor
	public function edit($id)
	{
		return view("editor.edit",["editor"=>Editor::findOrFail($id)]);

	}




	public function update(EditorFormRequest $request, $id)
	{
		$editor=Editor::findOrFail($id);
		$editor->id_editor=$request->get('id_editor');
		$editor->editor=$request->get('editor');
		$editor->update();

		return Redirect::to('editor');

	}
	
	public function destroy($id)
	{
		$editor=Editor::findOrFail($id);
		$editor->delete();
		return Redirect::to('editor');
	}

}
