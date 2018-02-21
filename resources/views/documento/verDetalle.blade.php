@extends ('layouts.admin')
@section ('contenido')

<h1> Detalle del Documento </h1>
<h5> ( {{$documento->Id_doc}} ) {{$documento->titulo}}</h5>

<br>
<ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
          <button class="btn btn-primary"  id="generales-tab" data-toggle="tab" href="#generales" role="tab" aria-controls="generales" aria-selected="true">Generales</button>
        </li>
       
        <li class="nav-item">
                <button class="btn btn-outline-success" id="actorsocial-tab" data-toggle="tab" href="#actorsocial" role="tab" aria-controls="actorsocial" aria-selected="false">Actores Social</button>
        </li>
        <li class="nav-item">
                <button class="btn btn-outline-danger" id="instituciones-tab" data-toggle="tab" href="#instituciones" role="tab" aria-controls="instituciones" aria-selected="false">Instituciones</button>
        </li>
        <li class="nav-item">
          <button class="btn btn-outline-warning" id="temas-tab" data-toggle="tab" href="#temas" role="tab" aria-controls="temas" aria-selected="false">Temas</button>
        </li>
        <li class="nav-item">
          <button class="btn btn-outline-info" id="lugares-tab" data-toggle="tab" href="#lugares" role="tab" aria-controls="lugares" aria-selected="false">Lugares</button>
        </li>
        <li class="nav-item">
                <button class="btn btn-outline-dark" id="subtemas-tab" data-toggle="tab" href="#subtemas" role="tab" aria-controls="subtemas" aria-selected="false">Subtemas</button>
      </li>
        
        <li class="nav-item">
                <button class="btn btn-outline-primary" id="obras-tab" data-toggle="tab" href="#obras" role="tab" aria-controls="obras" aria-selected="false">Obras</button>
              </li>
      </ul>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="generales" role="tabpanel" aria-labelledby="generales-tab">
                <br>
                <table class="table table-bordered">
                          <tr>
                                <th>ID de Documento</th>
                                <td> {{$documento->Id_doc}}</td>
                          </tr>
                          <tr>
                                <th>Titulo</th>
                                <td> {{$documento->titulo}}</td>
                          </tr>
                          <tr>
                                <th>Tipo de Documento</th>
                                <td> {{$documento->titulo}}</td>
                          </tr>
                          <tr>
                                <th>Lugar de Publicación</th>
                                <td>{{$documento->lugar_public_edo}} , {{$documento->lugar_public_pais}}</td>
                          </tr>
                          <tr>
                                <th>Derecho</th>
                                @if ($documento->derecho_autor==0)
                                <td> No tiene derechos de autor</td>
                                @endif
                                @if ($documento->derecho_autor==1)
                                <td> Si tiene derechos de Autor</td>
                                @endif
                          </tr>
                          <tr>
                                <th>Investigador</th>
                                <td> <strong> {{$documento->investigador}} </strong></td>
                          </tr>
                          <tr>
                                <th>URL</th>
                                <td> <a href="{{ $documento->url}}">{{ $documento->url}}</a></td>
                               
                          </tr>
                          <tr>
                                <th>Autor(es)</th>
                              @if (count($autores)==0)
                                <td>Sin Autores vinculados</td>
                              @else
                              <td>
                                @foreach ($autores as $autor)
                                   ( {{$autor->Id_autor}}) {{$autor->pseudonimo}} {{$autor->nombre}}  {{$autor->apellidos}} <br>   
                                @endforeach 
                                </td>
                                @endif
                        </tr>
                               
                          <tr>
                                <th>Editor</th>
                                <td> {{$documento->lugar_public_pais}}</td>
                          </tr>
                          <tr>
                                <th>Fecha de Publicación</th>
                                <td> {{$documento->fecha_publi}}</td>
                          </tr>
                          <tr>
                                <th>Fecha de Consulta</th>
                                <td> {{$documento->fecha_consulta}}</td>
                          </tr>
                          <tr>
                                <th>Fecha de Registro</th>
                                <td> {{$documento->fecha_registro}}</td>
                          </tr>
                          <tr>
                                <th>Notas</th>
                                <td> {{$documento->lugar_public_pais}}</td>
                          </tr>
                          <tr>
                                <th>Población</th>
                                <td> {{$documento->lugar_public_pais}}</td>
                          </tr>
                          <tr>
                                <th>Proyecto</th>
                                <td> {{$documento->lugar_public_pais}}</td>
                          </tr>
                          <tr>
                                <th>Estado de Revisión</th>
                                <td> {{$documento->lugar_public_pais}}</td>
                          </tr>
                          <tr>
                                <th>Publicado</th>
                                <td> {{$documento->lugar_public_pais}}</td>
                          </tr>
                      </table>

        </div>
        <div class="tab-pane fade" id="actorsocial" role="tabpanel" aria-labelledby="actorsocial-tab">
              <br>
              <h4>Actores Sociales</h4>
            <table class="table table-bordered">
                  @if (count($actoresSociales)==0)
                  <center>Sin Actores Sociales vinculados</center>
                  @else
                          <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>Cargo</th>
                          </tr>
                          <tr>
                                 
                                @foreach ($actoresSociales as $actor)
                                <td> 
                                    {{$actor->Id_persona}}
                                </td>
                                <td>
                                      {{ $actor->nombre  }}
                                </td>
                                <td>
                                      {{ $actor->apellidos}}
                                </td>
                                <td>
                                      {{ $actor->cargo}}
                                </td>
                        </tr>
                                @endforeach
                                @endif
                          
                      </table>
        </div>
        <div class="tab-pane fade" id="temas" role="tabpanel" aria-labelledby="temas-tab">
              <br>
              <h4>Temas que se tocan en el documento</h4>
            <table class="table table-bordered">
                  @if (count($temas)==0)
                  <center>Sin Temas vinculados</center>
                  @else
                          <tr>
                                @foreach ($temas as $tema)
                                <td> 
                                    {{$tema->descripcion}}
                                </td>
                          </tr>
                                @endforeach
                        @endif

                          
                      </table>
        </div>
        <div class="tab-pane fade" id="lugares" role="tabpanel" aria-labelledby="lugares-tab">
              <br>
            <h4>Temas que se tocan en el documento</h4>
            <table class="table table-bordered">
                  @if (count($lugares)==0)
                  <center>Sin Lugares vinculados</center>
                  @else
                  <tr>
                        <th>ID</th>
                        <th>Ubicación</th>
                        <th>País</th>
                        <th>Región Geografica</th>
                        
                  </tr>
                          <tr>
                                @foreach ($lugares as $lugar)
                                <td> 
                                    {{$lugar->id}}
                                </td>
                                <td> 
                                    {{$lugar->ubicacion}}
                                </td>
                                <td> 
                                    {{$lugar->pais}}
                                </td>
                                <td> 
                                    {{$lugar->region}}
                                </td>  
                         </tr>
                                @endforeach
                                @endif
                          
                      </table>
        </div>
        <div class="tab-pane fade" id="instituciones" role="tabpanel" aria-labelledby="instituciones-tab">
              <br>
             <h4>Instituciones</h4>
            <table class="table table-bordered">
                   @if (count($instituciones)==0)
                  <center>Sin instituciones vinculadas</center>
                  @else
                          <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Siglas</th>
                                <th>Pais</th>
                                <th>Localidad</th>
                          </tr>
                          <tr>
                                @foreach ($instituciones as $inst)
                                <td> 
                                    {{$inst->Id_institucion}}
                                </td>
                                <td>
                                      {{ $inst->nombre  }}
                                </td>
                                <td>
                                      {{ $inst->siglas}}
                                </td>
                                <td>
                                      {{ $inst->pais}}
                                </td>
                                <td>
                                      {{ $inst->localidad}}
                                </td>
                        </tr>
                                @endforeach
                                @endif
                          
                      </table>
        </div>
        <div class="tab-pane fade" id="subtemas" role="tabpanel" aria-labelledby="subtemas-tab">
              <br>
              <h4>Subtemas que se tocan en el documento</h4>
            <table class="table table-bordered">
                  @if (count($subtemas)==0)
                  <center>Sin Subtemas vinculados</center>
                  @else
                          <tr>
                                @foreach ($subtemas as $sub)
                                
                                <td> 
                                    {{$sub->subtema}}
                                </td>
                                
                        </tr>
                                @endforeach
                        @endif
                          
                      </table>
        </div>
        <div class="tab-pane fade" id="obras" role="tabpanel" aria-labelledby="obras-tab">
              <br>
            <h4>Obras que se tocan en el documento</h4>
            <table class="table table-bordered">
                  @if (count($obras)==0)
                  <center>Sin Obras vinculadas</center>
                 @else
                  <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                  </tr> 
                  @foreach ($obras as $obra)
                                <tr>
                                    <td> 
                                    {{$obra->id_obra}}
                                </td>
                                <td> 
                                    {{$obra->nombre}}
                                </td>
                                
                              </tr>
                                @endforeach
                   @endif  
                          
                      </table>
        </div>
      </div>               

@endsection