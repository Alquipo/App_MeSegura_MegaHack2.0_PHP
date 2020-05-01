<div class="table-responsive">
    <table class="table" id="receitas-table">
        <thead>
            <tr>
                <th>Situação</th>
                <th>Nome</th>
                <th>Valor</th>
                <th>Data</th>
                <th>Categoria</th>
                <th colspan="3">Ação</th>
            </tr>
        </thead>
        <tbody>
        @foreach($receitas as $receita)
            <tr>
                <td>{{ $receita->efetuada }}</td>
                <td>{{ $receita->nome }}</td>
                <td>{{ $receita->valor }}</td>
                <td>{{ $receita->data_formatada }}</td>
                <td>{{ $receita->categoria->nome }}</td>
                <td>
                    {!! Form::open(['route' => ['receitas.destroy', $receita->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('receitas.show', [$receita->id]) }}" class='btn btn-default btn-xs' title="Mostrar"><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('receitas.edit', [$receita->id]) }}" class='btn btn-default btn-xs' title="Editar"><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash" title="Excluir"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Você tem certeza?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
