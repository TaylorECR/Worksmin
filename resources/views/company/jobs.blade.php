@extends('layouts.app')

@push('styles')

@endpush

@section('content')

<!-- Single Candidate Start -->
<section class="single-candidate-page section_70">
 <div class="container">
    <div class="row">
       <div class="col-md-9 col-lg-6">
          <div class="single-candidate-box">
             <div class="single-candidate-img">
                <img src="/images/users/logo_4.png" alt="Verlie Mertz" />
             </div>
             <div class="single-candidate-box-right">
                <h4>{{--$company->title--}}</h4>
                <p>{{--$company->sector->sector--}}</p>
             </div>
          </div>
       </div>
    </div>
 </div>
</section>
<!-- Single Candidate End -->
<!-- Top Job Area Start -->
<section class="jobguru-top-job-area browse-page section_70">
   <div class="container">
      <div class="row">
         <!--end col-->
         <div class="col-md-12">
            <div class="available-count">
               <h4><a href="javascript:void(0)">{{$jobs[0]->company->jobs_count}}</a> ofertas de empleo publicadas</h4>
            </div>
         </div>
      </div>
      <div class="row">
         @foreach($jobs as $job)
         @include('company.job-card')
         @endforeach
      </div>
      {{$jobs->links()}}
   </div>
</section>
<!-- Top Job Area End -->

@endsection


@push('scripts')

@endpush
