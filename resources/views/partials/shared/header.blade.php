<!-- Header Area Start -->
<header class="jobguru-header-area stick-top forsticky page-header">
   <div class="menu-animation">
      <div class="container-fluid">
         <div class="row">
            <div class="col-lg-2">
               <div class="site-logo">
                  <a href="{{route('home.index')}}">
                  <img src="{{asset('assets/img/logo-2.png')}}" alt="jobguru" />
                  </a>
               </div>
               <!-- Responsive Menu Start -->
               <div class="jobguru-responsive-menu"></div>
               <!-- Responsive Menu Start -->
            </div>
            @include('partials.navigations.'.\App\User::navigation())
         </div>
      </div>
   </div>
</header>
<!-- Header Area End -->