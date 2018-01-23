<?php

namespace practicasUnam\Http\Controllers;

use Illuminate\Http\Request;
use practicasUnam\Autor;
use practicasUnam\Http\Requests\AutorFormRequest;
use Illuminate\Support\Facades\Redirect;
use DB;

class AutorController extends Controller
{
    public function __construct()
    {

    }

    public function index(Request $request)
    {
        if ($request) {
            $query = trim($request->get('searchText'));
            $autores = DB::table('autor')
                ->where('nombre', 'LIKE', '%' . $query . '%')
                ->orwhere('apellidos', 'LIKE', '%' . $query . '%')
                ->orwhere('pseudonimo', 'LIKE', '%' . $query . '%')
                ->orderBy('id_autor', 'desc')
                ->paginate(10);
            return view('autor.index', ['autores' => $autores, "searchText" => $query]);
        }
    }

    public function create()
    {
        return view('autor.create');
    }

    public function store(CategoriaFormRequest $request)
    {
        $autor = new Autor;
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

    public function update(CategoriaFormRequest $request, $id)
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
        $categoria->destroy();

        return Redirect::to('autor');

    }
}
