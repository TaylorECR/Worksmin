<!-- end sidebar single list -->
<div class="sidebar-list-single">
   <div class="top-company-list">
      <div class="company-list-logo">
         <a href="{{route('job.show', $job->slug)}}">
         <img src="{{$job->company->user->pathAttachment()}}" alt="{{$job->title}}" title="{{$job->company->title}}">
         </a>
      </div>
      <div class="company-list-details">
         <h3><a href="{{route('job.show', $job->slug)}}">{{$job->title}}</a></h3>
         <p class="company-state"><i class="fa fa-map-marker"></i> {{$job->province->province}}, {{$job->province->department->department}}</p>
         <p class="open-icon"><i class="fa fa-clock-o"></i>{{$job->publishedDate()}}</p>
         <p class="varify"><i class="fa fa-check"></i>Sueldo ofertado : S/{{round($job->min_salary, 0)}} - S/{{round($job->max_salary, 0)}}</p>
      </div>
      <div class="company-list-btn">
         <a href="{{route('job.show', $job->slug)}}" class="jobguru-btn">Ver oferta</a>
      </div>
   </div>
</div>
<!-- end sidebar single list -->