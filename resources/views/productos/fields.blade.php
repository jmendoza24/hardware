<div class="row">
<!-- Fabricante Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('fabricante', 'Fabricante:') !!}
        <select class="form-control" name="fabricante" id="fabricante" onchange="obtiene_catalogo(1,'catalogo')">
            <option value="">Seleccione una opcion</option>
            @foreach($fabricantes as $fab)
                <option value="{{ $fab->id_fabricante}}" {{$productos->fabricante==$fab->id_fabricante?'selected':''}}>{{ $fab->fabricante}}</option>
            @endforeach
        </select> 
    </div>

    <!-- Catalogo Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('catalogo', 'Catalogo:') !!}
        <select class="form-control" name="catalogo" id="catalogo" onchange="obtiene_catalogo(2,'familia')">
            <option value="">Seleccione una opcion</option>
            @foreach($catalogos  as $c)
            <option value="{{ $c->id}}" {{ $productos->catalogo== $c->id?'selected':''}} >{{ $c->catalogo}}</option>
            @endforeach
        </select>
    </div>

    <!-- Pagina Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('pagina', 'Pagina:') !!}
        {!! Form::text('pagina', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Familia Field --> 
    <div class="form-group col-sm-6">
        {!! Form::label('familia', 'Familia:') !!}
        <select class="form-control" name="familia" id="familia" onchange="obtiene_catalogo(3,'categoria')">
            <option value="">Seleccione una opcion</option>
            @foreach($familia  as $f)
            <option value="{{ $f->id}}" {{ $productos->familia== $f->id?'selected':''}} >{{ $f->familia}}</option>
            @endforeach
        </select>
    </div>

    <!-- Categoria Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('categoria', 'Categoria:') !!}
        <select class="form-control" name="categoria" id="categoria" onchange="obtiene_catalogo(4,'subcategoria')">
            <option value="">Seleccione una opcion</option>
            @foreach($categoria  as $c)
            <option value="{{ $c->id}}" {{ $productos->categoria== $c->id?'selected':''}} >{{ $c->categoria}}</option>
            @endforeach
        </select>
    </div>

    <!-- Subcategoria Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('subcategoria', 'Subcategoria:') !!}
        <select class="form-control" name="subcategoria" id="subcategoria" onchange="obtiene_catalogo(5,'disenio')">
            <option value="">Seleccione una opcion</option>
            @foreach($subcategorias  as $s)
            <option value="{{ $s->id}}" {{ $productos->subcategoria== $s->id?'selected':''}} >{{ $s->subcategoria}}</option>
            @endforeach
        </select>
    </div>

    <!-- Disenio Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('disenio', 'Diseño:') !!}
        <select class="form-control" name="disenio" id="disenio" onchange="obtiene_catalogo(6,'item')">
            <option value="">Seleccione una opcion</option>
             @foreach($disenio as $d)
            <option value="{{$d->id}}" {{ $productos->disenio== $d->id?'selected':''}}>{{ $d->disenio}}</option>
            @endforeach 
        </select>
    </div>

    <!-- Item Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('item', 'Item:') !!}
        <select class="form-control" name="item" id="item" >
            <option value="">Seleccione una opcion</option>
            @foreach($items as $i)
            <option value="{{$i->id}}" {{ $productos->id_item== $i->id?'selected':''}}>{{ $i->item}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('item', 'Vistas i:') !!}
        <select class="form-control" name="info" id="info" >
            <option value="">Seleccione una opcion</option>
            @foreach($listado_vistas as $l)
            <option value="{{$l->id}}" {{ $productos->info== $l->id?'selected':''}}>{{ $l->nombre}}</option>
            @endforeach
        </select>
    </div>
</div>


<div class="row" id="bw_lista" style="{{ $productos->fabricante!=77 ? 'display:none':''}}">
<h4 class="form-section col-md-12" id="bw_separador"></h4>
    <!-- Grupo Sufijo Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('grupo_sufijo', 'Grupo Sufijo:') !!} 
        <select class="form-control" name="grupo_sufijo" id="grupo_sufijo" onchange="buscar_elemento('grupo_sufijo','sufijo')">
            <option value="">Seleccione una opcion</option>
            @foreach($sub_baldwins as $s)
                @if($s->variable==2 and $s->fabricante==77)
                <option value="{{$s->id}}" {{$productos->grupo_sufijo==$s->id?'selected':''}}>{{$s->subcatalogo}}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('sufijo', 'Sufijo:') !!}
        <select class="form-control" name="sufijo" id="sufijo">
            <option value="">Seleccione una opcion</option>
            @foreach($sufijo as $s)
                <option value="{{$s}}" {{$productos->sufijo==$s?'selected':''}}>{{$s}}</option>
            @endforeach 
        </select>
    </div>
<h4 class="form-section col-md-12"></h4>
</div>

<div class="row">
    <!-- Descripcion Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('descripcion', 'Descripcion:') !!}
        {!! Form::text('descripcion', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Descripcion Mtk Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('descripcion_mtk', 'Descripcion Mtk:') !!}
        {!! Form::text('descripcion_mtk', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Especificacion Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('especificacion', 'Especificacion:') !!}
        {!! Form::text('especificacion', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="row" id="elementos_mtk" style="{{ $productos->fabricante!=76 ? 'display:none':''}}">
    <h4 class="form-section col-md-12" id="separador_mtk">Selectores Emtek</h4>
    <!-- Selector Mtk Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('selector_mtk', 'DC EMK:') !!}
        <select class="form-control" name="selector_mtk">
            <option value="">Seleccione...</option>
            @foreach($sub_baldwins as $s)
                @if($s->variable==1 and $s->fabricante==76)
                <option value="{{$s->id}}" {{$productos->selector_mtk==$s->id?'selected':''}}>{{$s->subcatalogo}}</option>
                @endif
            @endforeach
        </select>
    </div>

    <!-- Mortise Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('mortise', 'MORTISE EMK:') !!}
        <select class="form-control" name="mortise">
            <option value="">Seleccione...</option>
            @foreach($sub_baldwins as $s)
                @if($s->variable==2 and $s->fabricante==76)
                <option value="{{$s->id}}" {{$productos->mortise==$s->id?'selected':''}}>{{$s->subcatalogo}}</option>
                @endif
            @endforeach
        </select>
    </div>

    <!-- Fmm1 Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('fmm1', 'FMM1 EMK:') !!}
        <select class="form-control" name="fmm1">
            <option value="">Seleccione...</option>
            @foreach($sub_baldwins as $s)
                @if($s->variable==3 and $s->fabricante==76)
                <option value="{{$s->id}}" {{$productos->fmm1==$s->id?'selected':''}}>{{$s->subcatalogo}}</option>
                @endif
            @endforeach
        </select>
    </div>

    <!-- Stem Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('stem', 'STEM EMK:') !!}
        <select class="form-control" name="stem">
            <option value="">Seleccione...</option>
            @foreach($sub_baldwins as $s)
                @if($s->variable==4 and $s->fabricante==76)
                <option value="{{$s->id}}" {{$productos->stem==$s->id?'selected':''}}>{{$s->subcatalogo}}</option>
                @endif
            @endforeach
        </select>
    </div>

    <!-- Fmm2 Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('fmm2', 'FMM2 EMK:') !!}
        <select class="form-control" name="fmm2">
            <option value="">Seleccione...</option>
            @foreach($sub_baldwins as $s)
                @if($s->variable==5 and $s->fabricante==76)
                <option value="{{$s->id}}" {{$productos->fmm2==$s->id?'selected':''}}>{{$s->subcatalogo}}</option>
                @endif
            @endforeach
        </select>
    </div>

    <!-- Handle Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('handle', 'HANDLE EMK:') !!}
        <select class="form-control" name="handle">
            <option value="">Seleccione...</option>
            @foreach($sub_baldwins as $s)
                @if($s->variable==6 and $s->fabricante==76)
                <option value="{{$s->id}}" {{$productos->handle==$s->id?'selected':''}}>{{$s->subcatalogo}}</option>
                @endif
            @endforeach
        </select>
    </div>

    <!-- Fmm3 Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('fmm3', 'FMM3 EMK:') !!}
        <select class="form-control" name="fmm3">
            <option value="">Seleccione...</option>
            @foreach($sub_baldwins as $s)
                @if($s->variable==7 and $s->fabricante==76)
                <option value="{{$s->id}}" {{$productos->fmm3==$s->id?'selected':''}}>{{$s->subcatalogo}}</option>
                @endif
            @endforeach
        </select>
    </div>

    <!-- Wheel Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('wheel', 'WHEEL EMK:') !!}
        <select class="form-control" name="wheel">
            <option value="">Seleccione...</option>
            @foreach($sub_baldwins as $s)
                @if($s->variable==8 and $s->fabricante==76)
                <option value="{{$s->id}}" {{$productos->wheel==$s->id?'selected':''}}>{{$s->subcatalogo}}</option>
                @endif
            @endforeach
        </select>
    </div>

    <!-- Fastener Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('fastener', 'FASTENER EMK:') !!}
        <select class="form-control" name="fastener">
            <option value="">Seleccione...</option>
            @foreach($sub_baldwins as $s)
                @if($s->variable==9 and $s->fabricante==76)
                <option value="{{$s->id}}" {{$productos->fastener==$s->id?'selected':''}}>{{$s->subcatalogo}}</option>
                @endif
            @endforeach
        </select>
    </div>

    <!-- Style Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('style', 'STYLE EMK:') !!}
        <select class="form-control" name="style">
            <option value="">Seleccione...</option>
            @foreach($sub_baldwins as $s)
                @if($s->variable==10 and $s->fabricante==76)
                <option value="{{$s->id}}" {{$productos->style==$s->id?'selected':''}}>{{$s->subcatalogo}}</option>
                @endif
            @endforeach
        </select>
    </div>

    <!-- Finish Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('finish', 'FINISH EMK:') !!}
        <select class="form-control" name="finish">
            <option value="">Seleccione...</option>
            @foreach($sub_baldwins as $s)
                @if($s->variable==11 and $s->fabricante==76)
                <option value="{{$s->id}}" {{$productos->finish==$s->id?'selected':''}}>{{$s->subcatalogo}}</option>
                @endif
            @endforeach
        </select>
    </div>
</div>

<div class="row" id="seccion_bwh" style="{{ $productos->fabricante!=77 ? 'display:none':''}}">
    <h4 class="form-section col-md-12" id="separador_bwh">Selectores Baldwin</h4>
    <!-- Style 1 Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('style_1', 'STYLE 1 BWH:') !!}
        <select class="form-control" name="style_1">
            <option value="">Seleccione...</option>
            @foreach($sub_baldwins as $s)
                @if($s->variable==3 and $s->fabricante==77)
                <option value="{{$s->id}}" {{$productos->style_1==$s->id?'selected':''}}>{{$s->subcatalogo}}</option>
                @endif
            @endforeach
        </select>
    </div>

    <!-- Style 2 Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('style_2', 'STYLE 2 BWH:') !!}
        <select class="form-control" name="style_2">
            <option value="">Seleccione...</option>
            @foreach($sub_baldwins as $s)
                @if($s->variable==4 and $s->fabricante==77)
                <option value="{{$s->id}}" {{$productos->style_2==$s->id?'selected':''}}>{{$s->subcatalogo}}</option>
                @endif
            @endforeach
        </select>
    </div>

    <!-- Style 3 Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('style_3', 'STYLE 3 BWH:') !!}
        <select class="form-control" name="style_3">
            <option value="">Seleccione...</option>
            @foreach($sub_baldwins as $s)
                @if($s->variable==5 and $s->fabricante==77)
                <option value="{{$s->id}}" {{$productos->style_3==$s->id?'selected':''}}>{{$s->subcatalogo}}</option>
                @endif
            @endforeach
        </select>
    </div>

    <!-- Latch Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('latch', 'LATCH BWH:') !!}
        <select class="form-control" name="latch">
            <option value="">Seleccione...</option>
            @foreach($sub_baldwins as $s)
                @if($s->variable==6 and $s->fabricante==77)
                <option value="{{$s->id}}" {{$productos->latch==$s->id?'selected':''}}>{{$s->subcatalogo}}</option>
                @endif
            @endforeach
        </select>
    </div>

    <!-- Strike Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('strike', 'STRIKE BWH:') !!}
        <select class="form-control" name="strike">
            <option value="">Seleccione...</option>
            @foreach($sub_baldwins as $s)
                @if($s->variable==7 and $s->fabricante==77)
                <option value="{{$s->id}}" {{$productos->strike==$s->id?'selected':''}}>{{$s->subcatalogo}}</option>
                @endif
            @endforeach
        </select>
    </div>

    <!-- Cylinder Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('cylinder', 'CYLINDER BWH:') !!}
        <select class="form-control" name="cylinder">
            <option value="">Seleccione...</option>
            @foreach($sub_baldwins as $s)
                @if($s->variable==8 and $s->fabricante==77)
                <option value="{{$s->id}}" {{$productos->cylinder==$s->id?'selected':''}}>{{$s->subcatalogo}}</option>
                @endif
            @endforeach
        </select>
    </div>

    <!-- Keyling Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('keyling', 'KEYLING:') !!}
        <select class="form-control" name="keyling">
            <option value="">Seleccione...</option>
            @foreach($sub_baldwins as $s)
                @if($s->variable==9 and $s->fabricante==77)
                <option value="{{$s->id}}" {{$productos->keyling==$s->id?'selected':''}}>{{$s->subcatalogo}}</option>
                @endif
            @endforeach
        </select>
    </div>
</div>
<h4 class="form-section"></h4>
<div class="row">
    <!-- Finish Det 1 Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('finish_det_1', 'DC1 BWH:') !!}
        <select class="form-control" name="finish_det_1">
            <option value="">Seleccione...</option>
            @foreach($sub_baldwins as $s)
                @if($s->variable==10 and $s->fabricante==77)
                <option value="{{$s->id}}" {{$productos->finish_det_1==$s->id?'selected':''}}>{{$s->subcatalogo}}</option>
                @endif
            @endforeach
        </select>
    </div>

    <!-- Finish Det 2 Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('finish_det_2', 'DC2 BWH:') !!}
        <select class="form-control" name="finish_det_2">
            <option value="">Seleccione...</option>
            @foreach($sub_baldwins as $s)
                @if($s->variable==11 and $s->fabricante==77)
                <option value="{{$s->id}}" {{$productos->finish_det_2==$s->id?'selected':''}}>{{$s->subcatalogo}}</option>
                @endif
            @endforeach
        </select>
    </div>

    <!-- Finish Det 3 Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('finish_det_3', 'DC3 BWH:') !!}
        <select class="form-control" name="finish_det_3">
            <option value="">Seleccione...</option>
            @foreach($sub_baldwins as $s)
                @if($s->variable==12 and $s->fabricante==77)
                <option value="{{$s->id}}" {{$productos->finish_det_3==$s->id?'selected':''}}>{{$s->subcatalogo}}</option>
                @endif
            @endforeach
        </select>
    </div>

    <!-- Finish Det 4 Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('finish_det_4', 'DC4 BWH:') !!}
        <select class="form-control" name="finish_det_4">
            <option value="">Seleccione...</option>
            @foreach($sub_baldwins as $s)
                @if($s->variable==13 and $s->fabricante==77)
                <option value="{{$s->id}}" {{$productos->finish_det_4==$s->id?'selected':''}}>{{$s->subcatalogo}}</option>
                @endif
            @endforeach
        </select>
    </div>

    <!-- Dependencias Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('dependencias', 'DEP BWH:') !!}
        <select class="form-control" name="dependencias" id="dependencias">
            <option value="">Seleccione una opcion</option>
            <option value="1" {{$productos->dependencias==1?'selected':''}}>Si</option>
            <option value="0" {{$productos->dependencias==0?'selected':''}}>No</option>
        </select>
    </div>
</div>
<h4 class="form-section"></h4>
<div class="row">
    <!-- Handing Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('handing', 'Handing:') !!}
        <select class="form-control" name="handing" id="handing">
            <option value="">Seleccione una opcion</option>
            <option value="LH" {{$productos->handing=='LH'?'selected':''}}>LH</option>
            <option value="RH" {{$productos->handing=='RH'?'selected':''}}>RH</option>
        </select>
    </div>

    <!-- Door Thickness Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('door_thickness', 'Door Thickness:') !!}
        {!! Form::text('door_thickness', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Backset Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('backset', 'Backset:') !!}
        <select class="form-control" name="backset">
            <option value="">Seleccione...</option>
            @foreach($sub_baldwins as $s)
                @if($s->variable==1 and $s->fabricante==0)
                <option value="{{$s->id}}" {{$productos->backset==$s->id?'selected':''}}>{{$s->subcatalogo}}</option>
                @endif
            @endforeach
        </select>
    </div>
</div>
<h4 class="form-section"></h4>
<div class="row">
    <!-- Costo 1 Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('costo_1', 'Costo 1:') !!}
        {!! Form::text('costo_1', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Costo 2 Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('costo_2', 'Costo 2:') !!}
        {!! Form::text('costo_2', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Costo 3 Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('costo_3', 'Costo 3:') !!}
        {!! Form::text('costo_3', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Costo 4 Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('costo_4', 'Costo 4:') !!}
        {!! Form::text('costo_4', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Calculo Codigo Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('calculo_codigo', 'Cálculo Código:') !!}
        <select class="form-control" name="calculo_codigo" id="calculo_codigo" required="">
            <option value="">Seleccione una opcion</option>
            @foreach($formulas as $f)
                <option value="{{ $f->id}}" {{$productos->calculo_codigo==$f->id?'selected':''}}>{{ $f->formula}}</option>
            @endforeach
        </select>
    </div>

    <!-- Codigo Sistema Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('codigo_sistema', 'Código Sistema:') !!}
        {!! Form::text('codigo_sistema', null, ['class' => 'form-control','readonly']) !!}
    </div>

    <!-- Notas Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('notas', 'Notas:') !!}
        {!! Form::textarea('notas', null, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="row" style="{{ $productos->fabricante!=77 ? 'display:none':''}}" id="seccion_bwh_2">
    <h4 class="form-section col-md-12">Baldwind</h4>
    <!-- Exterior Tim Dep 1 Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('exterior_tim_dep_1', 'D1 EXTERIOR TRIM:') !!}
        <select class="form-control" name="exterior_tim_dep_1">
            <option value="182">Seleccione...</option>
            @foreach($sub_baldwins as $s)
                @if($s->variable==15 and $s->fabricante==77)
                <option value="{{$s->id}}" {{$productos->exterior_tim_dep_1==$s->id?'selected':''}}>{{$s->subcatalogo}}</option>
                @endif
            @endforeach
        </select>
    </div>

    <!-- Exterior Tim 1 Accion Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('exterior_tim_1_accion', 'D1 ACCION:') !!}
        <select class="form-control" name="exterior_tim_1_accion">
            <option value="">Seleccione...</option>
            <option value="1" {{$productos->exterior_tim_1_accion==1?'selected':''}}>SI</option>
            <option value="0" {{$productos->exterior_tim_1_accion==0?'selected':''}}>NO</option>
            {{-- @foreach($sub_baldwins as $s)
                @if($s->variable==16 and $s->fabricante==77)
                <option value="{{$s->id}}" {{$productos->exterior_tim_1_accion==$s->id?'selected':''}}>{{$s->subcatalogo}}</option>
                @endif
            @endforeach --}}
        </select>
    </div>

    <!-- Int Escutcheon Dep 2 Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('int_escutcheon_dep_2', 'D2 INTERIOR ESCUTCHEON:') !!}
        <select class="form-control" name="int_escutcheon_dep_2">
            <option value="182">Seleccione...</option>
            @foreach($sub_baldwins as $s)
                @if($s->variable==17 and $s->fabricante==77)
                <option value="{{$s->id}}" {{$productos->int_escutcheon_dep_2==$s->id?'selected':''}}>{{$s->subcatalogo}}</option>
                @endif
            @endforeach
        </select>
    </div>
    <!-------------------------------------->
    <div class="form-group col-sm-6">
        {!! Form::label('int_escutcheon_dep2_accion', 'D2 ACCION:') !!}
        <select class="form-control" name="int_escutcheon_dep2_accion">
            <option value="">Seleccione...</option>
            <option value="1" {{$productos->int_escutcheon_dep2_accion==1?'selected':''}}>SI</option>
            <option value="0" {{$productos->int_escutcheon_dep2_accion==0?'selected':''}}>NO</option>
            {{-- @foreach($sub_baldwins as $s)
                @if($s->variable==18 and $s->fabricante==77)
                <option value="{{$s->id}}" {{$productos->knob_lever_dep3==$s->id?'selected':''}}>{{$s->subcatalogo}}</option>
                @endif
            @endforeach --}}
        </select>
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('knob_lever_dep3', 'D3 KNOB/LEVER:') !!}
        <select class="form-control" name="knob_lever_dep3">
            <option value="182">Seleccione...</option>
            @foreach($sub_baldwins as $s)
                @if($s->variable==19 and $s->fabricante==77)
                <option value="{{$s->id}}" {{$productos->knob_lever_dep3==$s->id?'selected':''}}>{{$s->subcatalogo}}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('knob_lever_dep3_accion', 'D3 ACCION:') !!}
        <select class="form-control" name="knob_lever_dep3_accion">
            <option value="">Seleccione...</option>
            <option value="1" {{$productos->knob_lever_dep3_accion==1?'selected':''}}>SI</option>
            <option value="0" {{$productos->knob_lever_dep3_accion==0?'selected':''}}>NO</option>
            {{-- @foreach($sub_baldwins as $s)
                @if($s->variable==20 and $s->fabricante==77)
                <option value="{{$s->id}}" {{$productos->knob_lever_dep3_accion==$s->id?'selected':''}}>{{$s->subcatalogo}}</option>
                @endif
            @endforeach --}}
        </select>
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('spindle_dep4', 'D4 SPINDLE:') !!}
        <select class="form-control" name="spindle_dep4">
            <option value="182">Seleccione...</option>
            @foreach($sub_baldwins as $s)
                @if($s->variable==21 and $s->fabricante==77)
                <option value="{{$s->id}}" {{$productos->spindle_dep4==$s->id?'selected':''}}>{{$s->subcatalogo}}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('spindle_dep4_accion', 'D4 ACCION:') !!}
        <select class="form-control" name="spindle_dep4_accion">
            <option value="">Seleccione...</option>
            <option value="1" {{$productos->spindle_dep4_accion==1?'selected':''}}>SI</option>
            <option value="0" {{$productos->spindle_dep4_accion==0?'selected':''}}>NO</option>
            {{-- @foreach($sub_baldwins as $s)
                @if($s->variable==22 and $s->fabricante==77)
                <option value="{{$s->id}}" {{$productos->spindle_dep4_accion==$s->id?'selected':''}}>{{$s->subcatalogo}}</option>
                @endif
            @endforeach --}}
        </select>
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('cylinder_dep5', 'D5 CYLINDER:') !!}
        <select class="form-control" name="cylinder_dep5">
            <option value="182">Seleccione...</option>
            @foreach($sub_baldwins as $s)
                @if($s->variable==23 and $s->fabricante==77)
                <option value="{{$s->id}}" {{$productos->cylinder_dep5==$s->id?'selected':''}}>{{$s->subcatalogo}}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('cylinder_dep5_accion', 'D5 ACCION:') !!}
        <select class="form-control" name="cylinder_dep5_accion">
            <option value="">Seleccione...</option>
            <option value="1" {{$productos->cylinder_dep5_accion==1?'selected':''}}>SI</option>
            <option value="0" {{$productos->cylinder_dep5_accion==0?'selected':''}}>NO</option>
            {{-- @foreach($sub_baldwins as $s)
                @if($s->variable==24 and $s->fabricante==77)
                <option value="{{$s->id}}" {{$productos->cylinder_dep5_accion==$s->id?'selected':''}}>{{$s->subcatalogo}}</option>
                @endif
            @endforeach --}}
        </select>
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('mortise_lock_dep6', 'D6 MORTISE LOCK:') !!}
        <select class="form-control" name="mortise_lock_dep6">
            <option value="182">Seleccione...</option>
            @foreach($sub_baldwins as $s)
                @if($s->variable==25 and $s->fabricante==77)
                <option value="{{$s->id}}" {{$productos->mortise_lock_dep6==$s->id?'selected':''}}>{{$s->subcatalogo}}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('mortise_lock_dep6_accion', 'D6 ACCION:') !!}
        <select class="form-control" name="mortise_lock_dep6_accion">
            <option value="">Seleccione...</option>
            <option value="1" {{$productos->mortise_lock_dep6_accion==1?'selected':''}}>SI</option>
            <option value="0" {{$productos->mortise_lock_dep6_accion==0?'selected':''}}>NO</option>
            {{-- @foreach($sub_baldwins as $s)
                @if($s->variable==26 and $s->fabricante==77)
                <option value="{{$s->id}}" {{$productos->mortise_lock_dep6_accion==$s->id?'selected':''}}>{{$s->subcatalogo}}</option>
                @endif
            @endforeach --}}
        </select>
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('blocking_dep7', 'D7 BLOCKING RING:') !!}
        <select class="form-control" name="blocking_dep7">
            <option value="182">Seleccione...</option>
            @foreach($sub_baldwins as $s)
                @if($s->variable==27 and $s->fabricante==77)
                <option value="{{$s->id}}" {{$productos->blocking_dep7==$s->id?'selected':''}}>{{$s->subcatalogo}}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('blocking_dep7_accion', 'D7 ACCION:') !!}
        <select class="form-control" name="blocking_dep7_accion">
            <option value="">Seleccione...</option>
            <option value="1" {{$productos->blocking_dep7_accion==1?'selected':''}}>SI</option>
            <option value="0" {{$productos->blocking_dep7_accion==0?'selected':''}}>NO</option>
            {{-- @foreach($sub_baldwins as $s)
                @if($s->variable==28 and $s->fabricante==77)
                <option value="{{$s->id}}" {{$productos->blocking_dep7_accion==$s->id?'selected':''}}>{{$s->subcatalogo}}</option>
                @endif
            @endforeach --}}
        </select>
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('turn_knob8', 'D8 TURN KNOB/ADAPTOR:') !!}
        <select class="form-control" name="turn_knob8">
            <option value="182">Seleccione...</option>
            @foreach($sub_baldwins as $s)
                @if($s->variable==29 and $s->fabricante==77)
                <option value="{{$s->id}}" {{$productos->turn_knob8==$s->id?'selected':''}}>{{$s->subcatalogo}}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('turn_knob8_accion', 'D8 ACCION:') !!}
        <select class="form-control" name="turn_knob8_accion">
            <option value="">Seleccione...</option>
            <option value="1" {{$productos->turn_knob8_accion==1?'selected':''}}>SI</option>
            <option value="0" {{$productos->turn_knob8_accion==0?'selected':''}}>NO</option>
            {{-- @foreach($sub_baldwins as $s)
                @if($s->variable==30 and $s->fabricante==77)
                <option value="{{$s->id}}" {{$productos->turn_knob8_accion==$s->id?'selected':''}}>{{$s->subcatalogo}}</option>
                @endif
            @endforeach --}}
        </select>
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('dep9', 'Knobs/Levers:') !!}
        <select class="form-control" name="dep9">
            <option value="182">Seleccione...</option>
            @foreach($sub_baldwins as $s)
                @if($s->variable==31 and $s->fabricante==77)
                <option value="{{$s->id}}" {{$productos->dep9==$s->id?'selected':''}}>{{$s->subcatalogo}}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('dep9_accion', 'D9 ACCION:') !!}
        <select class="form-control" name="dep9_accion">
            <option value="">Seleccione...</option>
            <option value="1" {{$productos->dep9_accion==1?'selected':''}}>SI</option>
            <option value="0" {{$productos->dep9_accion==0?'selected':''}}>NO</option>
            {{-- @foreach($sub_baldwins as $s)
                @if($s->variable==32 and $s->fabricante==77)
                <option value="{{$s->id}}" {{$productos->dep9_accion==$s->id?'selected':''}}>{{$s->subcatalogo}}</option>
                @endif
            @endforeach --}}
        </select>
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('dep10_libre', 'Spindles:') !!}
        <select class="form-control" name="dep10_libre">
            <option value="182">Seleccione...</option>
            @foreach($sub_baldwins as $s)
                @if($s->variable==33 and $s->fabricante==77)
                <option value="{{$s->id}}" {{$productos->dep10_libre==$s->id?'selected':''}}>{{$s->subcatalogo}}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('dep10_libre_accion', 'D10 ACCION:') !!}
        <select class="form-control" name="dep10_libre_accion">
            <option value="">Seleccione...</option>
            <option value="1" {{$productos->dep10_libre_accion==1?'selected':''}}>SI</option>
            <option value="0" {{$productos->dep10_libre_accion==0?'selected':''}}>NO</option>
            {{-- @foreach($sub_baldwins as $s)
                @if($s->variable==34 and $s->fabricante==77)
                <option value="{{$s->id}}" {{$productos->dep10_libre_accion==$s->id?'selected':''}}>{{$s->subcatalogo}}</option>
                @endif
            @endforeach --}}
        </select>
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('dep11_libre', 'Cylinders:') !!}
        <select class="form-control" name="dep11_libre">
            <option value="182">Seleccione...</option>
            @foreach($sub_baldwins as $s)
                @if($s->variable==35 and $s->fabricante==77)
                <option value="{{$s->id}}" {{$productos->dep11_libre==$s->id?'selected':''}}>{{$s->subcatalogo}}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('dep11_libre_accion', 'D11 ACCION:') !!}
        <select class="form-control" name="dep11_libre_accion">
            <option value="">Seleccione...</option>
            <option value="1" {{$productos->dep11_libre_accion==1?'selected':''}}>SI</option>
            <option value="0" {{$productos->dep11_libre_accion==0?'selected':''}}>NO</option>
            {{-- @foreach($sub_baldwins as $s)
                @if($s->variable==36  and $s->fabricante==77)
                <option value="{{$s->id}}" {{$productos->dep11_libre_accion==$s->id?'selected':''}}>{{$s->subcatalogo}}</option>
                @endif
            @endforeach --}}
        </select>
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('dep12_libre', 'D12 LIBRE:') !!}
        <select class="form-control" name="dep12_libre">
            <option value="182">Seleccione...</option>
            @foreach($sub_baldwins as $s)
                @if($s->variable==37  and $s->fabricante==77)
                <option value="{{$s->id}}"  {{$productos->dep12_libre==$s->id?'selected':''}}>{{$s->subcatalogo}}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('dep12_libre_accion', 'D12 ACCION:') !!}
        <select class="form-control" name="dep12_libre_accion">
            <option value="">Seleccione...</option>
            <option value="1" {{$productos->dep12_libre_accion==1?'selected':''}}>SI</option>
            <option value="0" {{$productos->dep12_libre_accion==0?'selected':''}}>NO</option>
            {{-- @foreach($sub_baldwins as $s)
                @if($s->variable==38  and $s->fabricante==77)
                <option value="{{$s->id}}" {{$productos->dep12_libre_accion==$s->id?'selected':''}}>{{$s->subcatalogo}}</option>
                @endif
            @endforeach --}}
        </select>
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('dep_rossetes', 'D ROSETTES:') !!}
        <select class="form-control" name="dep_rossetes">
            <option value="182">Seleccione...</option>
            @foreach($sub_baldwins as $s)
                @if($s->variable==39  and $s->fabricante==77)
                <option value="{{$s->id}}" {{$productos->dep_rossetes==$s->id?'selected':''}}>{{$s->subcatalogo}}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('dep_rossetes_accion', 'DR ACCION:') !!}
        <select class="form-control" name="dep_rossetes_accion">
            <option value="">Seleccione...</option>
            <option value="1" {{$productos->dep_rossetes_accion==1?'selected':''}}>SI</option>
            <option value="0" {{$productos->dep_rossetes_accion==0?'selected':''}}>NO</option>
            {{-- @foreach($sub_baldwins as $s)
                @if($s->variable==40 and $s->fabricante==77)
                <option value="{{$s->id}}" {{$productos->dep_rossetes_accion==$s->id?'selected':''}}>{{$s->subcatalogo}}</option>
                @endif
            @endforeach --}}
        </select>
    </div>

    <div class="form-group col-sm-6">
        {!! Form::label('dep_latches', 'D LATCHES:') !!}
        <select class="form-control" name="dep_latches">
            <option value="182">Seleccione...</option>
            @foreach($sub_baldwins as $s)
                @if($s->variable==41 and $s->fabricante==77)
                <option value="{{$s->id}}" {{$productos->dep_latches==$s->id?'selected':''}}>{{$s->subcatalogo}}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('dep_latches_accion', 'DL ACCION:') !!}
        <select class="form-control" name="dep_latches_accion">
            <option value="">Seleccione...</option>
            <option value="1" {{$productos->dep_latches_accion==1?'selected':''}}>SI</option>
            <option value="0" {{$productos->dep_latches_accion==0?'selected':''}}>NO</option>
            {{-- @foreach($sub_baldwins as $s)
                @if($s->variable==42 and $s->fabricante==77)
                <option value="{{$s->id}}" {{$productos->dep_latches_accion==$s->id?'selected':''}}>{{$s->subcatalogo}}</option>
                @endif
            @endforeach --}}
        </select>
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('dep_adaptor', 'D ADAPTOR:') !!}
        <select class="form-control" name="dep_adaptor">
            <option value="182">Seleccione...</option>
            @foreach($sub_baldwins as $s)
                @if($s->variable==43 and $s->fabricante==77)
                <option value="{{$s->id}}" {{$productos->dep_adaptor==$s->id?'selected':''}}>{{$s->subcatalogo}}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('dep_adaptor_accion', 'DA ACCION:') !!}
        <select class="form-control" name="dep_adaptor_accion">
            <option value="">Seleccione...</option>
            <option value="1" {{$productos->dep_adaptor_accion==1?'selected':''}}>SI</option>
            <option value="0" {{$productos->dep_adaptor_accion==0?'selected':''}}>NO</option>
            {{-- @foreach($sub_baldwins as $s)
                @if($s->variable==44 and $s->fabricante==77)
                <option value="{{$s->id}}" {{$productos->dep_adaptor_accion==$s->id?'selected':''}}>{{$s->subcatalogo}}</option>
                @endif
            @endforeach --}}
        </select>
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('dep_spindle', 'DS SPINDLE:') !!}
        <select class="form-control" name="dep_spindle">
            <option value="182">Seleccione...</option>
            @foreach($sub_baldwins as $s)
                @if($s->variable==45 and $s->fabricante==77)
                <option value="{{$s->id}}" {{$productos->dep_spindle==$s->id?'selected':''}}>{{$s->subcatalogo}}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('dep_spindle_accion', 'DS ACCION:') !!}
        <select class="form-control" name="dep_spindle_accion">
            <option value="">Seleccione...</option>
            <option value="1" {{$productos->dep_spindle_accion==1?'selected':''}}>SI</option>
            <option value="0" {{$productos->dep_spindle_accion==0?'selected':''}}>NO</option>
            {{-- @foreach($sub_baldwins as $s)
                @if($s->variable==46 and $s->fabricante==77)
                <option value="{{$s->id}}" {{$productos->dep_spindle_accion==$s->id?'selected':''}}>{{$s->subcatalogo}}</option>
                @endif
            @endforeach --}}
        </select>
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('dep_extension', 'D EXT. BUTTON:') !!}
        <select class="form-control" name="dep_extension">
            <option value="182">Seleccione...</option>
            @foreach($sub_baldwins as $s)
                @if($s->variable==47 and $s->fabricante==77)
                <option value="{{$s->id}}" {{$productos->dep_extension==$s->id?'selected':''}}>{{$s->subcatalogo}}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('dep_extension_accion', 'DEXB ACCION:') !!}
        <select class="form-control" name="dep_extension_accion">
            <option value="">Seleccione...</option>
            <option value="1" {{$productos->dep_extension_accion==1?'selected':''}}>SI</option>
            <option value="0" {{$productos->dep_extension_accion==0?'selected':''}}>NO</option>
            {{-- @foreach($sub_baldwins as $s)
                @if($s->variable==48 and $s->fabricante==77)
                <option value="{{$s->id}}" {{$productos->dep_extension_accion==$s->id?'selected':''}}>{{$s->subcatalogo}}</option>
                @endif
            @endforeach --}}
        </select>
    </div>
</div>   
<div class="form-group col-sm-12" style="text-align: right;">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('productos.index') !!}" class="btn btn-secondary">Cancelar</a>
</div>
<hr>
<div class="row">
    <div class="col-md-12">
        <span class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" onclick="ver_catalogo(17,0,1,{{$productos->id}})" data-toggle="modal" data-backdrop="false" data-target="#primary">+ Foto</span> 
     </div>
     <br><br>
    <div class="col-md-12" id="tabla_catalogos">
        @include('productos.imagenes')
    </div>
</div>