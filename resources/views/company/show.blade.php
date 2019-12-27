@extends('layouts.app')

@push('styles')

@endpush

@section('content')
<!-- Single Candidate Start -->
<section class="single-candidate-page section_70">
	<div class="container">
		<div class="row">
		   <div class="col-md-6">
		      <div class="single-candidate-box">
		         <div class="single-candidate-img">
		            <img src="{{$company->user->pathAttachment()}}" alt="{{$company->title}}" />
		         </div>
		         <div class="single-candidate-box-right">
		            <h4>{{$company->title}}</h4>
		            <p>{{$company->sector->sector}}</p>
		         </div>
		      </div>
		   </div>
		   <div class="col-md-6">
		      <div class="single-candidate-action">
		         <a href="#" class="bookmarks"><i class="fa fa-map-marker"></i>Ver en el mapa</a>
		         <a href="{{route('company.jobs', $company->slug)}}" class="candidate-contact"><i class="fa fa-gavel"></i>Ofertas publicadas</a>
		      </div>
		   </div>
		</div>
		</div>
		</section>
		<!-- Single Candidate End -->


		<!-- Single Candidate Bottom Start -->
		<div class="single-candidate-bottom-area section_70">
		<div class="container">
		<div class="row">
		   <div class="col-lg-9 col-md-8">
		      <div class="single-candidate-bottom-left">
		         <div class="single-candidate-widget">
		            <h3>Biografía</h3>
		            <p>{{$company->biography}}</p>
		         </div>
		         <div class="single-candidate-widget">
		            <h3>({{$company->jobs_count}}) Ofertas Abiertas</h3>
		            @foreach($company->jobs as $job)
		            @include('company.posted-job-card')
		            @endforeach

		            <div class="single-candidate-action text-center">
			         	<a href="{{route('company.jobs', $company->slug)}}" class="jobguru-btn-2 btn-block"><i class="fa fa-gavel"></i>Ver todas las ofertas publicadas</a>
			      	</div>

		         </div>

		      </div>
		   </div>
		   <div class="col-lg-3 col-md-4">
		      <div class="single-candidate-bottom-right">
		         <div class="single-candidate-widget-2">
		            <h3>Social Links</h3>
		            <ul class="candidate-social">
		               <li><a href="#"><i class="fa fa-facebook"></i></a></li>
		               <li><a href="#"><i class="fa fa-twitter"></i></a></li>
		               <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
		               <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
		               <li><a href="#"><i class="fa fa-instagram"></i></a></li>
		               <li><a href="#"><i class="fa fa-globe"></i></a></li>
		            </ul>
		         </div>
		      </div>
		   </div>
		</div>
	</div>
</div>
<!-- Single Candidate Bottom End -->

@endsection


@push('scripts')

@endpush
