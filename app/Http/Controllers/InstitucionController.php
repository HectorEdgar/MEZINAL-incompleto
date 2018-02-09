<?php

namespace practicasUnam\Http\Controllers;

use Illuminate\Http\Request;
use practicasUnam\Http\Controllers\Controller;
use practicasUnam\Http\Requests;
use practicasUnam\Institucion;
use Illuminate\Support\Facades\Redirect;
use practicasUnam\Http\Requests\InstitucionFormRequest;
use DB;
use practicasUnam\Utilidad;
use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;


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


            $instituciones2 =DB::table('institucion')
            ->select('Id_institucion','nombre')
            ->orderBy('Id_institucion', 'desc')
            ->get();

            $instituciones = DB::table('institucion')
                ->where('nombre', 'LIKE', '%' . $query . '%')
                ->orwhere('siglas','LIKE','%' .$query . '%')
                ->orderBy('Id_institucion', 'desc')
                ->paginate(10);

            $json= $request->get('json');
            if($json == '1'){
                return response()->json(json_encode($instituciones2));
            }
            else{
                return view('institucion.index',['instituciones' => $instituciones, "searchText" => $query]);
            }

            
        }
    }

    public function create()
    {

        return view('institucion.create');
    }

    public function store(InstitucionFormRequest $request)
    {
        $institucion = new Institucion;
        $institucion->Id_institucion= Utilidad::getId("institucion","Id_institucion");
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
