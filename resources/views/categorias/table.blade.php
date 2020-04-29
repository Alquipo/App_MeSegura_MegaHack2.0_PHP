<div class="table-responsive">
    <table class="table" id="categorias-table">
        <thead>
            <tr>
                <th>Nome</th>
        <th>Ativo</th>
        <th>Tipo</th>
                <th colspan="3">Ação</th>
            </tr>
        </thead>
        <tbody>
        @foreach($categorias as $categoria)
            <tr>
                <td>{{ $categoria->nome }}</td>
            <td>{{ $categoria->ativo }}</td>
            <td>{{ $categoria->tipo }}</td>
                <td>
                    {!! Form::open(['route' => ['categorias.destroy', $categoria->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('categorias.show', [$categoria->id]) }}" class='btn btn-default btn-xs' title="Mostrar"><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('categorias.edit', [$categoria->id]) }}" class='btn btn-default btn-xs' title="Editar"><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash" title="Excluir"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Você tem certeza?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
