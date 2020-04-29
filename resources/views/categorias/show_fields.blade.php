<!-- Nome Field -->
<div class="form-group">
    {!! Form::label('nome', 'Nome:') !!}
    <p>{{ $categoria->nome }}</p>
</div>

<!-- Ativo Field -->
<div class="form-group">
    {!! Form::label('ativo', 'Ativo:') !!}
    <p>{{ $categoria->ativo }}</p>
</div>

<!-- Tipo Field -->
<div class="form-group">
    {!! Form::label('tipo', 'Tipo:') !!}
    <p>{{ $categoria->tipo }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $categoria->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $categoria->updated_at }}</p>
</div>

