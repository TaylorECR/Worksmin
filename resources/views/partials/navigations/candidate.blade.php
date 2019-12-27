<div class="col-lg-2 offset-lg-8">
	<div class="header-menu">
		<nav id="navigation">
		   <ul id="jobguru_navigation">
		      <li class="has-children">
		         <a href="#"><i class="fa fa-user"></i> Mi cuenta</a>
		         <ul>
		            <li><a href="{{route('candidate.dashboard.index')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		            @include('partials.navigations.logout')
		         </ul>
		      </li>
		   </ul>
		</nav>
	</div>
</div>
