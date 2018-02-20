<?php

namespace practicasUnam\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;  
use practicasUnam\Http\Requests;
use practicasUnam\Documento;
use practicasUnam\FechaNormal;
use practicasUnam\FechaExtra;
use Illuminate\Support\Facades\Redirect;
use practicasUnam\Http\Requests\DocumentoFormRequest;
use practicasUnam\Http\Requests\FechaNormalFormRequest;
use practicasUnam\Http\Requests\FechaExtraFormRequest;
use DB;
use practicasUnam\Http\Controllers\Controller;
use practicasUnam\Utilidad;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use Auth;       
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
            return view('documento.index', ['documento' => $documento, "searchText" => $query]);
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

          $categorias = $categorias->filter(function($item) { //funcion que quita elemnto con id 18 (Videos)
            return $item->id_cata_doc != 16;
        });
         
          $mesesFecha = array('nombre'=>'Enero', 'Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');
          return view('documento.create',['categorias' => $categorias,'mesesFecha'=> $mesesFecha]);
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

      $documento->Id_doc= Utilidad::getId('documento','Id_doc');
      $documento->titulo = $request->get('titulo');
      $documento->lugar_public_pais = $request->get('lugar_public_pais');
      $documento->lugar_public_edo = $request->get('lugar_public_edo');
      $documento->derecho_autor = $request->get('derecho_autor');
      $documento->fecha_publi = $request->get('fecha_publi');
      $documento->url = $request->get('url');
      $documento->investigador = Auth::user()->name;
      $documento->fecha_consulta = $request->get('fecha_consulta');
      $documento->poblacion = $request->get('poblacion');
      $documento->tipo = $request->get('tipo');
      $documento->notas = $request->get('notas');
      $documento->fecha_registro =  Carbon::now();;
      $documento->revisado = '0';
      $documento->linea = '0';

      if( $documento->notas ==null){
        $documento->notas = '';


      }
      ///

      $consultaTitulo = DB::table('documento')
      ->where('titulo', '=', $request->get('titulo'))->get();

      $consultaUrl = DB::table('documento')
      ->where('url', '=', $request->get('url'))->get();
///
    $idDocumento =  Utilidad::getId('documento','Id_doc');
      if(!$consultaTitulo->isEmpty()  && !$consultaUrl->isEmpty()){

        return Redirect::to('documento/create')->with('status', 'El documento ya se encuentra registrado!');

      }else{
        DB::beginTransaction();

      
        $fechaNormal = null;
        $fechaExtra = null;
        if($documento->save()){

            if($documento->fecha_publi==1){

                $fechaNormal = new FechaNormal;
                $fechaNormal->fk_doc = $idDocumento; //referencia id doc a la fecha normal
                $fechaNormal->fecha =  $request->get('fechaNormalValor');
                if($fechaNormal->fecha ==null){

                    $fechaNormal->fecha =  '0001-01-01';


                }
                $fechaNormal->save();
                
               

            }else{

                $fechaExtra = new FechaExtra;
                $fechaExtra->id_fx = $idDocumento; //referencia id doc a la fecha extra
                $fechaExtra->mes =  $request->get('fechaExtraMes');
                $fechaExtra->mes2 =  $request->get('fechaExtraAlMes');
                $fechaExtra->anio =  $request->get('fechaExtraAño');

                $fechaExtra->save();


            }

            // if($fechaNormal->save() || $fechaExtra->save() ){

            //     DB::commit(); //se realiza el commit a la base. Guarda cambios
            //     return Redirect::to('documento');

            // }else{

            //     DB::rollback(); // rollback si no se guarda documento
            //     return Redirect::to('documento/create')->with('status', 'Error al registrar documento');


            // }


          //  DB::commit(); //se realiza el commit a la base. Guarda cambios
            return Redirect::to('documento');




        }else{

            DB::rollback(); // rollback si no se guarda documento
            return Redirect::to('documento/create')->with('status', 'Error al registrar documento');
        }

        //$documento->save();

     
      }

      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       return view('documento.verDetalle', ["documento" => Documento::findOrFail($id)]);
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

      Utilidad::deleteFromTable('fecha','fk_doc',$id);
      Utilidad::deleteFromTable('fecha_extra','id_fx',$id);
      
      $documento->delete();

      return Redirect::to('documento');
    }
}
