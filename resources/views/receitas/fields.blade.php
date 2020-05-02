<!-- Nome Field -->
<div class="form-group col-12">
    {!! Form::label('nome', 'Nome:') !!}
    {!! Form::text('nome', null, ['class' => 'form-control']) !!}
</div>

<!-- Valor Field -->
@if(isset($update))
    <div class="form-group col-12">
        {!! Form::label('valor', 'Valor:') !!}
        {!! Form::text('valor', 'R$ '. number_format($receita['valor'], 2, ',', '.'), ['class' => 'form-control', 'id' => 'valor_receita']) !!}

    </div>

@else

    <div class="form-group col-12">
        {!! Form::label('valor', 'Valor:') !!}
        {!! Form::text('valor', 'R$ '. number_format(0, 2, ',', '.'), ['class' => 'form-control', 'id' => 'valor_receita']) !!}

    </div>
@endif


<!-- Data Field -->
<div class="form-group col-12">
    {!! Form::label('data', 'Data:') !!}
    {!! Form::text('data', null, ['class' => 'form-control','id'=>'data']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        // console.log('teste');
        $('#data').datetimepicker({
            format: 'DD/MM/YYYY',
            useCurrent: false,
        });
        

    
    </script>
@endpush

<!-- Categoria Id Field -->
<div class="form-group col-12">
    {!! Form::label('categoria_id', 'Categoria:') !!}
    {!! Form::select('categoria_id', $categorias->pluck('nome','id'), null, ['class' => 'form-control', 'placeholder' => 'Escolha uma categoria']) !!}
</div>

<div class="form-group col-12">
    {{-- <label class="checkbox-inline"> --}}
        {!! Form::hidden('efetuada', 0) !!}
        {!! Form::label('efetuada', 'Efetuada:', ) !!}
        {!! Form::checkbox('efetuada', 1, null,  ['data-toggle' => 'toggle', 'data-onstyle' => 'secondary', 'data-on' => 'Sim', 'data-off' => 'Não']) !!}
    {{-- </label> --}}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Salvar', ['class' => 'btn btn-secondary']) !!}
    <a href="{{ url('home') }}" class="btn btn-light">Cancelar</a>
</div>

{{-- <script src="{{asset('/js/jquery.maskMoney.min.js')}}"></script>
<script src="{{asset('/js/moedas.js')}}"></script> --}}