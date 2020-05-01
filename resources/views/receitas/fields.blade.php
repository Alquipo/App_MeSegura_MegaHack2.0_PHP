<!-- Nome Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nome', 'Nome:') !!}
    {!! Form::text('nome', null, ['class' => 'form-control']) !!}
</div>

<!-- Valor Field -->
<div class="form-group col-sm-6">
    {!! Form::label('valor', 'Valor:') !!}
    {!! Form::number('valor', null, ['class' => 'form-control']) !!}
</div>

<!-- Data Field -->
<div class="form-group col-sm-6">
    {!! Form::label('data', 'Data:') !!}
    {!! Form::text('data', null, ['class' => 'form-control','id'=>'data']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#data').datetimepicker({
            format: 'DD/MM/YYYY',
            useCurrent: false
        })
    </script>
@endpush

<!-- Efetuada Field -->
<div class="form-group col-sm-12">
    {!! Form::label('efetuada', 'Efetuada:') !!}
    <label class="radio-inline">
        {!! Form::radio('efetuada', "1", null) !!} Sim
    </label>

    <label class="radio-inline">
        {!! Form::radio('efetuada', "2", null) !!} Não
    </label>

</div>

<!-- Categoria Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('categoria_id', 'Categoria Id:') !!}
    {!! Form::select('categoria_id', $categorias->pluck('nome','id'), null, ['class' => 'form-control', 'placeholder' => 'Escolha uma categoria']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('receitas.index') }}" class="btn btn-default">Cancelar</a>
</div>
