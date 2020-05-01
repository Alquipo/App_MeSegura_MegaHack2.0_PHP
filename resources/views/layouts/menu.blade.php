






<li class="{{ Request::is('categorias*') ? 'active' : '' }}">
    <a href="{{ route('categorias.index') }}"><i class="fa fa-edit"></i><span>Categorias</span></a>
</li>



<li class="{{ Request::is('receitas*') ? 'active' : '' }}">
    <a href="{{ route('receitas.index') }}"><i class="fa fa-edit"></i><span>Receitas</span></a>
</li>

<li class="{{ Request::is('despesas*') ? 'active' : '' }}">
    <a href="{{ route('despesas.index') }}"><i class="fa fa-edit"></i><span>Despesas</span></a>
</li>

