<div class="col-lg-3 col-md-12 dashboard-left-border">
   <div class="dashboard-left">
      <ul class="dashboard-menu">
         <li class="{{ $word == 'dashboard' ? 'active' : '' }}">
            <a href="{{route('candidate.dashboard.index')}}">
               <i class="fa fa-tachometer"></i>
               Dashboard
            </a>
         </li>
         <li class="{{ $word == 'profile' ? 'active' : '' }}">
            <a href="{{route('candidate.dashboard.index', 'profile')}}">
               <i class="fa fa-users"></i>
               Mi perfil
            </a>
         </li>
         <!-- <li class="{{-- $word == 'messages' ? 'active' : '' --}}">
            <a href="{{--route('dashboard.index', 'messages')--}}">
               <i class="fa fa-envelope-open"></i>
               Mensajes
            </a>
         </li> -->
         <li class="{{ $word == 'applications' ? 'active' : '' }}">
            <a href="{{route('candidate.dashboard.index', 'applications')}}">
               <i class="fa fa-briefcase"></i>
               Postulaciones
            </a>
         </li>
         <!-- <li class="{{-- $word == 'earnings' ? 'active' : '' --}}">
            <a href="{{--route('dashboard.index', 'earnings')--}}">
               <i class="fa fa-rocket"></i>
               Ganancias
            </a>
         </li> -->
         @include('partials.dashboard.password')
      </ul>
   </div>
</div>