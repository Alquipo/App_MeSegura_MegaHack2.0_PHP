<div class="table-responsive">
    <table class="table" id="despesas-table">
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
        @foreach($despesas as $despesas)
            <tr>
                 @if($despesas->efetuada)
                    <td>   
                        <div class="status-span bg" title="Efetuado"></div>
                    </td>
                 @else
                    <td> 
                        <div class="status-span br" title="Pendente"></div>
                    </td>
                 @endif

                <td>{{ $despesas->nome }}</td>
                <td>{{ $despesas->valor }}</td>
                <td>{{ $despesas->data }}</td>
                <td>{{ $despesas->categoria->nome }}</td>
                <td>
                    {!! Form::open(['route' => ['despesas.destroy', $despesas->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('despesas.show', [$despesas->id]) }}" class='btn btn-default btn-xs' title="Mostrar"><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('despesas.edit', [$despesas->id]) }}" class='btn btn-default btn-xs' title="Editar"><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash" title="Excluir"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Você tem certeza?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
            
        @endforeach
        
                
        </tbody>
    </table>
    
</div>
