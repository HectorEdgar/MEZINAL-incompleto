@extends ('layouts.admin')
@section ('contenido')

<h1> Detalle del Documento </h1>
<ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Generales</a>
        </li>
        <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Atributos</a>
        </li>
        <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Actor Social</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Temas</a>
        </li>
        <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Instituciones</a>
        </li>
        <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Subtemas</a>
              </li>
        <li class="nav-item">
          <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Lugares</a>
        </li>
        <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Obras</a>
              </li>
      </ul>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                
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
                                <td> {{$documento->lugar_public_pais}} , {{$documento->lugar_public_edo}}</td>
                          </tr>
                          <tr>
                                <th>Derecho</th>
                                <td> {{$documento->Id_doc}}</td>
                          </tr>
                          <tr>
                                <th>Investigador</th>
                                <td> {{$documento->investigador}}</td>
                          </tr>
                          <tr>
                                <th>URL</th>
                                <td> <a href="{{ $documento->url}}">{{ $documento->url}}</a></td>
                          </tr>
                          <tr>
                                <th>Autor</th>
                                <td> {{$documento->lugar_public_pais}}</td>
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
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

    
        </div>
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
            
        </div>
      </div>               

@endsection