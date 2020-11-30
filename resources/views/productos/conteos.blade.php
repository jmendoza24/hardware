
@if($cantidad > 0)
<nav aria-label="Page navigation">
    <ul class="pagination justify-content-end">
      <li class="page-item"></li>
      @for($i=1; $i <= $cantidad; $i++)
      <li class="page-item {{ $i==$numero?'active':''}}"><a class="page-link" href="#" onclick="busca_producto({{ $i }})">{{ $i }}</a></li>
      @endfor
      <li class="page-item"></li>
    </ul>
  </nav>
  @endif
