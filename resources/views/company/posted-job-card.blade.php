<div class="single-work-history company-single-page">
   <div class="single-candidate-list">
      <div class="main-comment">
         <div class="candidate-text">
            <div class="candidate-info">
               <div class="candidate-title">
                  <h3><a href="{{route('job.show', $job->slug)}}" target="_BLANK">{{$job->title}}</a></h3>
               </div>
               <p class="company-state">
                  <i class="fa fa-map-marker"></i>
                  {{$job->province->department->department}}
               </p>
               <p class="open-icon">
                  <i class="fa fa-clock-o"></i>
                  {{$job->jobType->job_type}}
               </p>
               <p class="varify">
                  <i class="fa fa-check"></i>
                  Salario : S/{{round($job->min_salary, 0)}}-S/{{round($job->max_salary, 0)}}
               </p>
            </div>
            <div class="candidate-text-inner">
               <p>{{str_limit($job->description, 300)}}</p>
            </div>
         </div>
      </div>
   </div>
</div>