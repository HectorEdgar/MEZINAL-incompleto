<?php

namespace practicasUnam\Http\Controllers;

use Illuminate\Http\Request;
use practicasUnam\Http\Controllers\Controller;
use practicasUnam\Http\Requests;
use practicasUnam\Institucion;
use Illuminate\Support\Facades\Redirect;
use practicasUnam\Http\Requests\InstitucionFormRequest;
use DB;

class InstitucionController extends Controller
{
    //
    public function __construct()
    {
        //si no esta logeado regresa al login
        //ES COMO EL PINCHE SPRING SECURITY :v
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if ($request) {
            $query = trim($request->get('searchText'));
            $instituciones = DB::table('institucion')
                ->where('nombre', 'LIKE', '%' . $query . '%')
                ->orwhere('siglas','LIKE','%' .$query . '%')
                ->orderBy('Id_institucion', 'desc')
                ->paginate(10);
            return view('institucion.index', ['instituciones' => $instituciones, "searchText" => $query]);
        }
    }

    public function create()
    {
        return view('institucion.create');
    }

    public function store(InstitucionFormRequest $request)
    {

        //RELLENAR LOS HUECOS EN LOS ID
       
        $primerID = DB::table('institucion')
        ->min('Id_institucion');

        $ultimoID = DB::table('institucion')
        ->max('Id_institucion');
       
        $institucion = new Institucion;
        $institucion->Id_institucion= $ultimoID+1;
 		$institucion->nombre= $request->get('nombre');
		$institucion->siglas= $request->get('siglas');
 		$institucion->pais= $request->get('pais');
 		$institucion->localidad= $request->get('localidad');
 		$institucion->extra= $request->get('extra');

        $institucion->save();

        return Redirect::to('institucion');
    }

    public function show($id)
    {
        return view('institucion.show', ["institucion" => Institucion::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view('institucion.edit', ["institucion" => Institucion::findOrFail($id)]);
    }

    public function update(InstitucionFormRequest $request, $id)
    {
        $institucion = Institucion::findOrFail($id);
        $institucion->Id_institucion= $request->get('Id_institucion');
        $institucion->nombre= $request->get('nombre');
        $institucion->siglas= $request->get('siglas');
        $institucion->pais= $request->get('pais');
        $institucion->localidad= $request->get('localidad');
        $institucion->extra= $request->get('extra');
        $institucion->update();
        return Redirect::to('institucion');

    }

    public function destroy($id)
    {
        $institucion = Institucion::findOrFail($id);
        $institucion->delete();
        return Redirect::to('institucion');

    }
}
