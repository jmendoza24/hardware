<form id="catalogos_forma" action="">
    @csrf
    <input type="hidden" name="id_catalogo" value="2">
    <input type="hidden" name="id" value="{{$familias->id}}">
    <input type="hidden"  name="catalogo" id="catalogo" value="{{$familias->catalogo}}">
    
    <div class="form-group col-sm-12">
        {!! Form::label('familia', 'Familia:') !!}
        <input type="text" class="form-control" name="familia" id="familia" value="{{ $familias->familia}}">
    </div>

    <hr>
    <div class="form-group col-sm-12">
        <span class="btn btn-primary pull-right" onclick="guarda_catalogo(2,{{$familias->id}},1,'familias')">Guardar</span>
    </div>
