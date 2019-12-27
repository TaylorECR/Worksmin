<li class="{{ $word == 'password' ? 'active' : '' }}">
	<a href="{{route('dashboard.index', 'password')}}">
		<i class="fa fa-lock"></i>Cambiar contraseña
	</a>
</li>