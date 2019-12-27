<li>
   <div class="top-company-list">
      <div class="company-list-logo">
         <a href="{{route('company.show', $company->slug)}}">
         <img src="{{$company->user->pathAttachment()}}" alt="{{$company->title}}" />
         </a>
      </div>
      <div class="company-list-details">
         <h3><a href="#">{{$company->title}}</a></h3>
         <p class="company-state"><i class="fa fa-map-marker"></i> {{$company->province->province}}, {{$company->province->department->department}}</p>
         <p class="open-icon"><i class="fa fa-briefcase"></i>{{$company->jobs->count()}} ofertas publicadas</p>
      </div>
      <div class="company-list-btn">
         <a href="{{route('company.show', $company->slug)}}" class="jobguru-btn">Ver más</a>
      </div>
   </div>
</li>