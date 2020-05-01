<!-- Nome Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nome', 'Nome:') !!}
    {!! Form::text('nome', null, ['class' => 'form-control']) !!}
</div>

<!-- Valor Field -->
<div class="form-group col-sm-6">
    {!! Form::label('valor', 'Valor:') !!}
    {!! Form::text('valor', null, ['class' => 'form-control']) !!}
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
            useCurrent: false,
            
        });
        

    
    </script>
@endpush

<!-- Categoria Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('categoria_id', 'Categoria:') !!}
    {!! Form::select('categoria_id', $categorias->pluck('nome','id'), null, ['class' => 'form-control', 'placeholder' => 'Escolha uma categoria']) !!}
</div>

<!-- 'bootstrap / Toggle Switch Efetuada Field' -->
<div class="form-group col-sm-6">
    {!! Form::label('efetuada', 'Efetuada:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('efetuada', 0) !!}
        {!! Form::checkbox('efetuada', 1, null,  ['data-toggle' => 'toggle']) !!}
    </label>
</div>




<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('despesas.index') }}" class="btn btn-default">Cancelar</a>
</div>
