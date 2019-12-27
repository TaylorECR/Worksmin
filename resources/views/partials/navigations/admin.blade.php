<div class="col-lg-2 offset-lg-8">
	<div class="header-menu">
		<nav id="navigation">
		   <ul id="jobguru_navigation">
		      <li class="has-children">
		         <a href="#">Mi cuenta</a>
		         <ul>
		            <li><a href="{{route('dashboard.index')}}">Dashboard</a></li>
		            @include('partials.navigations.logout')
		         </ul>
		      </li>
		   </ul>
		</nav>
	</div>
</div>
