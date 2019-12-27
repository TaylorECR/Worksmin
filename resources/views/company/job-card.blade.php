<div class="col-md-12 col-lg-4">
   <div class="sigle-top-job">
      <div class="top-job-company-image">
         <h3><a href="{{route('job.show', $job->slug)}}" target="_BLANK">{{$job->title}}</a></h3>
      </div>
      <div class="top-job-company-desc">
         <ul>
            <li>Ubicación <span class="company-state"><i class="fa fa-map-marker"></i> {{$job->province->department->department}}</span></li>
            <li>Salario <span class="open-icon"><i class="fa fa-credit-card-alt"></i>S/{{round($job->min_salary,0)}}-S/{{round($job->max_salary,0)}}</span></li>
            <li>Tipo <span class="varify"><i class="fa fa-check"></i>{{$job->jobType->job_type}}</span></li>
         </ul>
         <div class="top-job-company-btn">
            <a href="{{route('job.show', $job->slug)}}" class="jobguru-btn-2" target="_BLANK">Ver oferta</a>
         </div>
      </div>
   </div>
</div>