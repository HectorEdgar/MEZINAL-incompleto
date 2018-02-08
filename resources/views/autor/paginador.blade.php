@if (count($autores)/10 > 0) 
    <nav aria-label="paginador">
        <ul class="pagination justify-content-center">
            @if ($page==1)
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">Anterior</a>
                </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="autor?page={{$page-1}}&searchText={{$searchText}}" tabindex="-1">Anterior</a>
                    </li>
            @endif
            
            
            
            <?php $cont=0?>
            <?php
                if($totalRegistros%10==0)
                {
                    $totalpaginadores=$totalRegistros/10;
                }else{
                    $totalpaginadores=intval($totalRegistros/10)+1;
                }
                
            ?>
            @for ($i = $page; $i < $totalpaginadores; $i++)
                @if ($page==$i)
                    <li class="page-item active">
                        <a class="page-link" href="autor?page={{$i}}&searchText={{$searchText}}">{{$i}} <span class="sr-only">(current)</span></a>
                    </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="autor?page={{$i}}&searchText={{$searchText}}">{{$i}}</a>
                        </li>
                @endif
                @if ($cont==9)
                    @break;
                @endif
                <?php $cont=$cont+1?>
            @endfor

            @if ($page==$totalpaginadores)
                <li class="page-item active">
                    <a class="page-link" href="autor?page={{$totalpaginadores}}&searchText={{$searchText}}">{{$totalpaginadores}}</a>
                </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="autor?page={{$totalpaginadores}}&searchText={{$searchText}}">{{$totalpaginadores}}</a>
                    </li>
            @endif
            @if ($page==$totalpaginadores)
                <li class="page-item disabled">
                    <a class="page-link" href="#">Siguiente</a>
                </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="autor?page={{$page+1}}&searchText={{$searchText}}">Siguiente</a>
                    </li>
            @endif
            
        </ul>
    </nav>
@endif
