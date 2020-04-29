<!-- Nome Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nome', 'Nome:') !!}
    {!! Form::text('nome', null, ['class' => 'form-control']) !!}
</div>

<!-- Ativo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ativo', 'Ativo:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('ativo', 0) !!}
        {!! Form::checkbox('ativo', '1', null) !!}
    </label>
</div>


<!-- Tipo Field -->
<div class="form-group col-sm-12">
    {!! Form::label('tipo', 'Tipo:') !!}
    <label class="radio-inline">
        {!! Form::radio('tipo', "R", null) !!} Receita
    </label>

    <label class="radio-inline">
        {!! Form::radio('tipo', "D", null) !!} Despesa
    </label>

    <label class="radio-inline">
        {!! Form::radio('tipo', "O", null) !!} Objetivo
    </label>

</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('categorias.index') }}" class="btn btn-default">Cancelar</a>
</div>
