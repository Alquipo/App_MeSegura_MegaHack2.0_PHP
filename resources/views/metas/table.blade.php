<div class="table-responsive">
    <table class="table" id="metas-table">
        <thead>
            <tr>
                <th>Valor</th>
                <th>Categoria Id</th>
                <th colspan="3">Ação</th>
            </tr>
        </thead>
        <tbody>
        @foreach($metas as $meta)
            <tr>
                
                <td>{{ $meta->valor_meta_formatado }}</td>
            <td>{{ $meta->categoria->nome }}</td>
                <td>
                    {!! Form::open(['route' => ['metas.destroy', $meta->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('metas.show', [$meta->id]) }}" class='btn btn-default btn-xs' title="Mostrar"><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('metas.edit', [$meta->id]) }}" class='btn btn-default btn-xs' title="Editar"><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash" title="Excluir"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Você tem certeza?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
