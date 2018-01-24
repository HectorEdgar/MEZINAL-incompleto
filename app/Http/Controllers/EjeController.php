<?php

namespace practicasUnam\Http\Controllers;

use Illuminate\Http\Request;
use practicasUnam\Eje;
use practicasUnam\Http\Requests\TemaFormRequest;
use Illuminate\Support\Facades\Redirect;
use DB;
class EjeController extends Controller
{
    public function __construct()
    {

    }

    public function index(Request $request)
    {
        if ($request) {
            $query = trim($request->get('searchText'));
            $ejes = DB::table('eje')
                ->where('nombre', 'LIKE', '%' . $query . '%')
                ->orwhere('descripcion', 'LIKE', '%' . $query . '%')
                ->orwhere('area', 'LIKE', '%' . $query . '%')
                ->orwhere('poblacion', 'LIKE', '%' . $query . '%')
                ->orwhere('Id_eje', 'LIKE', '%' . $query . '%')                         
                ->orderBy('Id_eje', 'desc')
                ->paginate(10);
            return view('eje.index', ['ejes' => $ejes, "searchText" => $query]);
        }
    }

    public function create()
    {
        return view('eje.create');
    }

    public function store(TemaFormRequest $request)
    {
        $eje = new Eje;
        $eje->nombre = $request->get('nombre');
        $eje->descripcion = $request->get('descripcion');
        $eje->area = $request->get('area');
        $eje->poblacion = $request->get('poblacion');
        $eje->save();

        return Redirect::to('eje');
    }

    public function show($id)
    {
        return view('eje.show', ["eje" => Eje::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view('eje.edit', ["eje" => Eje::findOrFail($id)]);
    }

    public function update(TemaFormRequest $request, $id)
    {
        $eje = Eje::findOrFail($id);
        $eje->nombre = $request->get('nombre');
        $eje->descripcion = $request->get('descripcion');
        $eje->area = $request->get('area');
        $eje->poblacion = $request->get('poblacion');
        $eje->update();
        return Redirect::to('eje');

    }

    public function destroy($id)
    {
        $eje = Eje::findOrFail($id);
        $eje->delete();

        //Session::flash('message','El eje fue eliminado');

        return Redirect::to('eje');

    }
}
