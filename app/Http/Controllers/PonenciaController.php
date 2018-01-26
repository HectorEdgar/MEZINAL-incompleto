<?php

namespace practicasUnam\Http\Controllers;

use Illuminate\Http\Request;
use practicasUnam\Http\Requests;
use practicasUnam\Ponencia;
use Illuminate\Support\Facades\Redirect;
use practicasUnam\Http\Requests\PonenciaFormRequest;
use DB;
use practicasUnam\Http\Controllers\Controller;

class PonenciaController extends Controller
{
    //


    public function __construct()
	{

	}


	 public function index(Request $request)
    {
        if ($request) {
            $query = trim($request->get('searchText'));
            $ponencias = DB::table('ponencias')
                ->where('fk_doc', '=', $query)
                ->orwhere('evento', 'LIKE', '%' . $query . '%')
                ->orwhere('lugar_presentacion', 'LIKE', '%' . $query . '%')
                ->orwhere('fecha_pesentacion', 'LIKE', '%' . $query . '%')
                ->orderBy('fk_doc', 'desc')
                ->paginate(10);
            return view('ponencia.index', ['ponencias' => $ponencias, "searchText" => $query]);
        }
    }

     public function create()
    {
        return view('ponencia.create');
    }


     public function store(PonenciaFormRequest $request)
    {
        $ponencia = new Ponencia;
        $ponencia->evento = $request->get('evento');
        $ponencia->lugar_presentacion = $request->get('lugar_presentacion');
        $ponencia->fecha_pesentacion = $request->get('fecha_pesentacion');

        $ponencia->save();

        return Redirect::to('ponencia');
    }

    public function show($id)
    {
        return view('ponencia.show', ["ponencia" => Ponencia::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view('ponencia.edit', ["ponencia" => Ponencia::findOrFail($id)]);
    }

    public function update(PonenciaFormRequest $request, $id)
    {
        $ponencia = Ponencia::findOrFail($id);
        $ponencia->evento = $request->get('evento');
        $ponencia->lugar_presentacion = $request->get('lugar_presentacion');
        $ponencia->fecha_pesentacion = $request->get('fecha_pesentacion');
        $ponencia->update();
        return Redirect::to('ponencia');

    }

    public function destroy($id)
    {
        $ponencia = Ponencia::findOrFail($id);
        $ponencia->delete();

      

        return Redirect::to('ponencia');

    }




}
