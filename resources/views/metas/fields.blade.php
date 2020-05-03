<!-- Valor Field -->
@if(isset($update))
    <div class="form-group col-12">
        {!! Form::label('valor', 'Valor:') !!}
        {!! Form::text('valor', 'R$ '. number_format($meta['valor'], 2, ',', '.'), ['class' => 'form-control', 'id' => 'valor_meta']) !!}
    </div>
@else
    <div class="form-group col-12">
        {!! Form::label('valor', 'Valor:') !!}
        {!! Form::text('valor', 'R$ '. number_format(0, 2, ',', '.'), ['class' => 'form-control', 'id' => 'valor_meta']) !!}

    </div>
@endif

<!-- Categoria Id Field -->
<div class="form-group col-12">
    {!! Form::label('categoria_id', 'Categorias:') !!}
    {!! Form::select('categoria_id', $categorias->pluck('nome','id'), null, ['class' => 'form-control', 'placeholder' => 'Escolha uma categoria']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('metas.index') }}" class="btn btn-default">Cancelar</a>
</div>
