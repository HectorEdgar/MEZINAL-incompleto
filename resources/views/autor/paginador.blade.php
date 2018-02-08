@if (count($records) === 1) 
@elseif (count($records) > 1) 
@endif
<nav aria-label="paginador">
    <ul class="pagination">
        <li class="page-item disabled">
            <a class="page-link" href="#" tabindex="-1">Anterior</a>
        </li>
        @foreach ($autores as $item)
            
        @endforeach
        <li class="page-item">
            <a class="page-link" href="#">Siguiente</a>
        </li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item active">
            <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
        </li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        
    </ul>
</nav>