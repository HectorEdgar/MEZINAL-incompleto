<?php

namespace practicasUnam\Http\Controllers;

use Illuminate\Http\Request;
use practicasUnam\Http\Requests;
use practicasUnam\Documento;
use Illuminate\Support\Facades\Redirect;
use practicasUnam\Http\Requests\DocumentoFormRequest;
use DB;
use practicasUnam\Http\Controllers\Controller;
use practicasUnam\Utilidad;
class DocumentoController extends Controller
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
            $documento = DB::table('documento')
                ->where('titulo', 'LIKE', '%' . $query . '%')
                ->orwhere('Id_doc', 'LIKE', '%' . $query . '%')
                ->orderBy('Id_doc', 'desc')
                ->paginate(10);
            return view('documento.index', ['documentos' => $documento, "searchText" => $query]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          $categorias=DB::table('catalogo_docu')->get();
          return view('documento.create',['categorias' => $categorias]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DocumentoFormRequest $request)
    {
      $documento = new Documento;

      $documento->titulo = $request->get('titulo');
      $documento->lugar_public_pais = $request->get('lugar_public_pais');
      $documento->lugar_public_edo = $request->get('lugar_public_edo');
      $documento->derecho_autor = $request->get('derecho_autor');
      $documento->fecha_publi = $request->get('fecha_publi');
      $documento->url = $request->get('url');
      $documento->investigador = $request->get('investigador');
      $documento->fecha_consulta = $request->get('fecha_consulta');
      $documento->poblacion = $request->get('poblacion');
      $documento->tipo = $request->get('tipo');
      $documento->notas = $request->get('notas');
      $documento->fecha_registro = $request->get('fecha_registro');
      $documento->revisado = $request->get('revisado');
      $documento->linea = $request->get('linea');
     


      $documento->save();

      return Redirect::to('documento');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       return view('documento.show', ["documento" => Documento::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('documento.edit', ["documento" => Documento::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DocumentoFormRequest $request, $id)
    {
       $documento = Documento::findOrFail($id);
       $documento->titulo = $request->get('titulo');
       $documento->lugar_public_pais = $request->get('lugar_public_pais');
      $documento->lugar_public_edo = $request->get('lugar_public_edo');
      $documento->derecho_autor = $request->get('derecho_autor');
      $documento->fecha_publi = $request->get('fecha_publi');
      $documento->url = $request->get('url');
      $documento->investigador = $request->get('investigador');
      $documento->fecha_consulta = $request->get('fecha_consulta');
      $documento->poblacion = $request->get('poblacion');
      $documento->tipo = $request->get('tipo');
      $documento->notas = $request->get('notas');
      $documento->fecha_registro = $request->get('fecha_registro');
      $documento->revisado = $request->get('revisado');
      $documento->linea = $request->get('linea');
      $documento->catalogo_docu_id_cata_doc = $request->get('catalogo_docu_id_cata_doc');

      $documento->update();
        return Redirect::to('documento');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $documento=Documento::findOrFail($id);
      $documento->delete();
        return Redirect::to('documento');
    }
}
