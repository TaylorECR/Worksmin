<div class="sidebar-list-single">
   <div class="top-company-list">
      <div class="company-list-logo">
         <a href="{{route('job.show', $related->slug)}}">
         <img src="{{$related->company->user->pathAttachment()}}" alt="{{$related->company->title}}">
         </a>
      </div>
      <div class="company-list-details">
         <h3><a href="{{route('job.show', $related->slug)}}">{{$related->title}}</a></h3>
         <p class="company-state"><i class="fa fa-map-marker"></i> {{$related->province->province}}, {{$related->province->department->department}}</p>
         <p class="open-icon"><i class="fa fa-clock-o"></i>2 minutes ago</p>
         <p class="varify"><i class="fa fa-check"></i>Salario : S/{{$related->min_salary}} - S/{{$related->max_salary}}</p>
      </div>
      <div class="company-list-btn">
         <a href="{{route('job.show', $related->slug)}}" class="jobguru-btn">Ver oferta</a>
      </div>
   </div>
</div>