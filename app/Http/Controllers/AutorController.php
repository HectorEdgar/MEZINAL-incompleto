<?php

namespace practicasUnam\Http\Controllers;

use Illuminate\Http\Request;
use practicasUnam\Autor;
use practicasUnam\Http\Requests\AutorFormRequest;
use Illuminate\Support\Facades\Redirect;
use DB;
use practicasUnam\Utilidad;

class AutorController extends Controller
{
    public function __construct()
    {
        //si no esta logeado regresa al login
        //ES COMO EL PINCHE SPRING SECURITY :v
        //$this->middleware('auth');
    }

    public function index(Request $request)
    {
        if ($request) {
            $query = trim($request->get('searchText'));
            $autores = DB::table('autor')
                ->where('nombre', 'LIKE', '%' . $query . '%')
                ->orwhere('apellidos', 'LIKE', '%' . $query . '%')
                ->orwhere('pseudonimo', 'LIKE', '%' . $query . '%')
                ->orwhere('Id_autor', 'LIKE', '%' . $query . '%')
                ->orderBy('Id_autor', 'desc')
                ->paginate(10);
            $page=$request->get('page');
            if($page==null){
                $page=1;
            }
            $numeroRegistros= DB::table('autor')
                ->where('nombre', 'LIKE', '%' . $query . '%')
                ->orwhere('apellidos', 'LIKE', '%' . $query . '%')
                ->orwhere('pseudonimo', 'LIKE', '%' . $query . '%')
                ->orwhere('Id_autor', 'LIKE', '%' . $query . '%')
                ->orderBy('Id_autor', 'desc')->count();

            return view('autor.index', 
                [
                    'autores' => $autores, 
                    "searchText" => $query,
                    "totalRegistros"=> $numeroRegistros,
                    "page"=> $page
                ]
            );
        }
    }

    public function create()
    {
        return view('autor.create');
    }

    public function store(AutorFormRequest $request)
    {
        
        $autor = new Autor;
        //Obtiene el Id 100 real
        $autor->Id_autor=Utilidad::getId("autor","Id_autor");
        $autor->pseudonimo = $request->get('pseudonimo');
        $autor->nombre = $request->get('nombre');
        $autor->apellidos = $request->get('apellidos');

        $autor->save();

        return Redirect::to('autor');
    }

    public function show($id)
    {
        return view('autor.show', ["autor" => Autor::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view('autor.edit', ["autor" => Autor::findOrFail($id)]);
    }

    public function update(AutorFormRequest $request, $id)
    {
        $autor = Autor::findOrFail($id);
        $autor->pseudonimo = $request->get('pseudonimo');
        $autor->nombre = $request->get('nombre');
        $autor->apellidos = $request->get('apellidos');
        $autor->update();
        return Redirect::to('autor');

    }

    public function destroy($id)
    {
        $autor = Autor::findOrFail($id);
        $autor->delete();

        //Session::flash('message','El autor fue eliminado');

        return Redirect::to('autor');

    }
}
