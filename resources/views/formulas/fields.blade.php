<!-- Compuesto Field -->
<div class="form-group col-sm-6">
    {!! Form::label('compuesto', 'Compuesto:') !!}
    {!! Form::text('compuesto', null, ['class' => 'form-control']) !!}
</div>

<!-- Formula Field -->
<div class="form-group col-sm-6">
    {!! Form::label('formula', 'Formula:') !!}
    {!! Form::text('formula', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('formulas.index') !!}" class="btn btn-default">Cancel</a>
</div>
