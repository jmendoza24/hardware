<form method="post"  action="@if($opcion =='editar') {{ route('ajaxupload.actualiza') }} @elseif($opcion =='nuevo') {{ route('ajaxupload.action')}} @endif" class="form-horizontal needs-validation novalidate" enctype='multipart/form-data'>
	<input type="hidden" name="_token" value="{{ csrf_token()}}">
	 <div class="row">
      
      <div class="col-md-12">
        <div class="form-group row">
          <label class="col-md-3 label-control" for="empresa">Dibujo:</label>
          <div class="col-md-9">
            <input type="file" name="foto" id="foto" class="form-control"  />
            @if(!empty($producto_dibujos->dibujo))
          <a href="{{ $producto_dibujos->dibujo }} " target="_blank">Ver_dibujo</a>
          @endif
            <div class="invalid-feedback">Este campo es requerido.</div>
          </div>

        </div>
      </div>
      <div class="col-md-12" style="text-align: right;">
        <hr>
        <input type="submit" name="upload" id="upload" class="btn btn_azul" value="Guardar">
      </div>
    </div>
</form>
