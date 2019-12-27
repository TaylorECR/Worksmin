<li>
   <div class="top-company-list">
      <div class="company-list-logo">
         <a href="{{route('job.show', $job->slug)}}">
         <img src="{{$job->company->user->pathAttachment()}}" alt="{{$job->company->title}}" />
         </a>
      </div>
      <div class="company-list-details">
         <h3><a href="{{route('job.show', $job->slug)}}">{{$job->title}}</a></h3>
         <p class="company-state"><i class="fa fa-map-marker"></i> {{$job->province->province}}, {{$job->province->department->department}}</p>
         <p class="open-icon"><i class="fa fa-clock-o"></i>{{$job->publishedDate()}}</p>
         <p class="varify"><i class="fa fa-check"></i>Salario : S/{{$job->min_salary}} - S/{{$job->max_salary}}</p>
      </div>
      <div class="company-list-btn">
         <a href="{{route('job.show', $job->slug)}}" class="jobguru-btn">Ver oferta</a>
      </div>
   </div>
</li>