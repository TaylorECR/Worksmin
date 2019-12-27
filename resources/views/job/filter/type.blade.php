<!-- Single Job Sidebar Start -->
<div class="single-job-sidebar sidebar-type">
  <h3>Tipo de trabajo</h3>
  <div class="job-sidebar-box">
     <ul>
        @foreach(\App\JobType::pluck('job_type', 'id') as $id => $job_type)
            <li class="checkbox">
               <input class="checkbox-spin" type="checkbox" id="job_type_{{$id}}" value="{{$id}}" />
               <label for="job_type_{{$id}}"><span></span>{{$job_type}}</label>
            </li>
        @endforeach
     </ul>
  </div>
</div>
<!-- Single Job Sidebar End -->