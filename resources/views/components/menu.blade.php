<nav class="bg-blue-400 p-8 text-white">
    <ul class="flex space-x-4">
        <li>
            <a href="{{ route('inicio')}}" class="{{ request()->routeIs('inicio') ? 'font-bold underline ' : 'hover:underline   ' }}">Inicio</a>
        </li>

        <li>
            <a href="{{ route('prueba.index')}}" class="{{ request()->routeIs('prueba.index') ? 'font-bold underline ' : 'hover:underline   ' }}">Prueba</a>
        </li>

        <li>
            <a href="{{ route('transacciones.index')}}" class="{{ request()->routeIs('transacciones.index') ? 'item-activo' : '' }}">Transacciones</a>
            </li>

        <li>
            <a href="{{ route('user.index')}}" class="{{ request()->routeIs('user.index') ? 'font-bold underline ' : 'hover:underline   ' }}">Usuario</a>
        </li>

         <li>
            <a href="{{ route('comprobantes.index')}}" class="{{ request()->routeIs('comprobantes.index') ? 'font-bold underline ' : 'hover:underline   ' }}">Comprobantes</a>
        </li>


    </ul>
</nav>

