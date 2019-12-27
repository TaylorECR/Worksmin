<li>
	<a href="{{ route('logout') }}"
       onclick="event.preventDefault();
       document.getElementById('logout-form').submit();"
    >
        <i class="fa fa-power-off"></i> Cerrar sesión
    </a>
	<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</li>