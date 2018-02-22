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
        $documento =Documento::findOrFail($id);


        //TIPO DE DOCUMENTO
             if($documento->tipo==1)
            $tipoConsulta = 'Articulo';
        else if ($documento->tipo==2)
            $tipoConsulta = 'Boletines';
        else if ($documento->tipo==3)
            $tipoConsulta = 'Cartas y Oficios';
        else if ($documento->tipo==4)
            $tipoConsulta = 'Cronicas';
        else if ($documento->tipo==5)
            $tipoConsulta = 'Declaraciones y Comunicados';
        else if ($documento->tipo==6)
            $tipoConsulta = 'Discursos';
        else if ($documento->tipo==7)
            $tipoConsulta = 'Informes';
        else if ($documento->tipo==8)
            $tipoConsulta = 'Libros';
        else if ($documento->tipo==9)
            $tipoConsulta = 'Notas';
        else if ($documento->tipo==10)
            $tipoConsulta = 'Ponencias';
        else if ($documento->tipo==11)
            $tipoConsulta = 'Proyectos';
        else if ($documento->tipo==12)
            $tipoConsulta = 'Otros';
        else if ($documento->tipo==13)
            $tipoConsulta = 'Tesis';
        else if ($documento->tipo==14)
            $tipoConsulta = 'Articulo de Revista';
        else if ($documento->tipo==15)
            $tipoConsulta = 'Capitulo de Libros';
        else if ($documento->tipo==16)
            $tipoConsulta = 'Videos';
        else if ($documento->tipo==17)
            $tipoConsulta = 'Revistas';
        else if ($documento->tipo==18)
            $tipoConsulta = 'Articulos de Boletín';
        else if($documento==null)
             $tipoConsulta = '- - - - - - -';

        //LUGAR DE PUBLICACION
        $lugarPublicacion=$documento->lugar_public_edo . " " . $documento->lugar_public_pais;

        //DERECHOS DE AUTOR
        if($documento->derecho_autor==0)
            $derecho_autorConsulta = 'No';
        else if ($documento->derecho_autor==1)
            $derecho_autorConsulta = 'Si';
        
        //NOTAS
        if($documento->notas=='')
            $notas = '- - - - - - - -';
        else
            $notas = $documento->notas;

        
        //POBLACION
        if ($documento->poblacion==1)
        $poblacion = 'Afrodescendiente';
        else if ($documento->poblacion==2)
        $poblacion = 'Indígena';
        else if ($documento->poblacion==3)
        $poblacion = 'Afrodescendiente e Indígena';
        else if ($documento->poblacion==0)
        $poblacion = 'Sin población asignada';

        //ESTADO DE LA REVISION
        if ($documento->revisado==0)
        $revisado= ' Referencia Pendiente de revisión';
        else if ($documento->revisado==1)
        $revisado= ' Referencia Revisada';
                               
        //PUBLICADO

        if($documento->linea=1)
        $linea='En Linea';
        else
        $linea='No establecido';
                               

               

        $actoresSociales = DB::table('persona as p')
        ->join('cntrl_persona as cp','cp.fk_persona',"=",'p.Id_persona')
        ->join('documento as d','d.Id_doc',"=",'cp.fk_doc')
        ->where('fk_doc',$documento->Id_doc)
        ->get();

        $instituciones =DB::table('institucion as i')
        ->join('cntrl_Instit as cp','cp.fk_instit',"=",'i.Id_institucion')
        ->join('documento as d','d.Id_doc',"=",'cp.fk_doc')
        ->where('fk_doc',$documento->Id_doc)
        ->get();

        $temas =DB::table('temas as t')
        ->join('cntrl_tema as cp','cp.fk_tema',"=",'t.id_tema')
        ->join('documento as d','d.Id_doc',"=",'cp.fk_doc')
        ->where('fk_doc',$documento->Id_doc)
        ->get();

        $lugares =DB::table('lugar as l')
        ->join('cntrl_lugar as cp','cp.fk_lugar',"=",'l.id_lugar')
        ->join('paises as p','p.id_pais',"=",'l.pais')
        ->join('region as r','r.id_region',"=",'l.region_geografica')
        ->join('documento as d','d.Id_doc',"=",'cp.fk_doc')
        ->select('l.id_lugar as id','l.ubicacion as ubicacion','p.nombre as pais' ,'r.nombrereg as region')
        ->where('fk_doc',$documento->Id_doc)
        ->get();

        $subtemas =DB::table('subtema as sub')
        ->join('cntrl_sub as cp','cp.fk_sub',"=",'sub.id_sub')
        ->join('documento as d','d.Id_doc',"=",'cp.fk_doc')
        ->where('fk_doc',$documento->Id_doc)
        ->get();

        $obras =DB::table('obras as obra')
        ->join('obra_doc as cp','cp.fk_obra',"=",'obra.id_obra')
        ->join('documento as d','d.Id_doc',"=",'cp.fk_doc')
        ->where('fk_doc',$documento->Id_doc)
        ->get();

        $autores =DB::table('autor as a')
        ->join('cntrl_autor as ca','ca.fk_autor',"=",'a.Id_autor')
        ->join('documento as d','d.Id_doc',"=",'ca.fk_doc')
        ->where('fk_doc',$documento->Id_doc)
        ->get();

        $editores =DB::table('editor as e')
        ->join('cntrl_editor as ce','ce.fk_editor',"=",'e.Id_editor')
        ->join('documento as d','d.Id_doc',"=",'ce.fk_doc')
        ->where('fk_doc',$documento->Id_doc)
        ->get();

        $fecha =DB::table('documento as d')
        ->join('fecha as ce','ce.fk_doc',"=",'d.Id_doc')
        ->where('fk_doc',$documento->Id_doc)
        ->select('ce.fecha as fecha')
        ->get();

        //Fecha 
        foreach ($fecha as $f) {
            $fechaVerdadera = $f->fecha;
        }

        $proyectos =DB::table('catalogo_proyecto as cat')
        ->join('cntrl_proyec as cp','cp.fk_proyec',"=",'cat.id_proyecto')
        ->join('documento as d','d.Id_doc',"=",'cp.fk_doc')
        ->select('cat.proyecto as proyecto','cat.id_proyecto as id')
        ->where('fk_doc',$documento->Id_doc)
        ->get();

       return view('documento.verDetalle', [
           "documento" => $documento,
           "tipo"=>$tipoConsulta,
           "derechos" => $derecho_autorConsulta,
           "lugarPublicacion"=>$lugarPublicacion,
           "notas"=>$notas,
           "poblacion"=>$poblacion,
           "revisado"=>$revisado,
           "linea"=>$linea,
           "actoresSociales"=>$actoresSociales,
           "instituciones"=>$instituciones,
           "temas"=>$temas,
           "lugares"=>$lugares,
           "subtemas"=>$subtemas,
           "obras"=>$obras,
           "autores"=>$autores,
           "editores"=>$editores,
           "proyectos"=>$proyectos,
           "fecha"=>$fechaVerdadera

           
           ]);
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
