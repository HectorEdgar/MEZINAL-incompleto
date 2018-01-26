<?php

namespace practicasUnam\Http\Controllers;

use Illuminate\Http\Request;
use practicasUnam\Http\Requests;
use practicasUnam\CategoriaDocumento;
use Illuminate\Support\Facades\Redirect;
use practicasUnam\Http\Requests\CategoriaDocumentoFormRequest;
use DB;
use practicasUnam\Http\Controllers\Controller;

class CategoriaDocumentoController extends Controller
{


    public function __construct()
    {

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index(Request $request)
    {
        if ($request) {
            $query = trim($request->get('searchText'));
            $categoriaDoc = DB::table('catalogo_docu')
                ->where('tipo_doc', 'LIKE', '%' . $query . '%')
                ->orwhere('id_cata_doc', 'LIKE', '%' . $query . '%') // duda por ser string
                ->orderBy('id_cata_doc', 'desc')
                ->paginate(10);
            return view('categoriaDocumento.index', ['categoriasDocumento' => $categoriaDoc, "searchText" => $query]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('categoriaDocumento.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   public function store(CategoriaDocumentoFormRequest $request)
    {
        $categoriaDocumento=new CategoriaDocumento;
        $categoriaDocumento->tipo_doc=$request->get('tipo_doc');
        $categoriaDocumento->save();
        return Redirect::to('categoriaDocumento');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view("categoriaDocumento.show",["categoriasDocumento"=>CategoriaDocumento::findOrFail($id)]);
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view("categoriaDocumento.edit",["categoriasDocumento"=>CategoriaDocumento::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoriaDocumentoFormRequest $request, $id)
    {
       $categoriaDocumento=CategoriaDocumento::findOrFail($id);
       $categoriaDocumento->tipo_doc=$request->get('tipo_doc');
       $pais->update();
    return Redirect::to('categoriaDocumento');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $categoriaDocumento=CategoriaDocumento::findOrFail($id);
        $categoriaDocumento->delete();
        return Redirect::to('categoriaDocumento');
    }
}
