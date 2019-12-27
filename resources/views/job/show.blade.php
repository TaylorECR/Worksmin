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
                <img src="{{$job->company->user->pathAttachment()}}" alt="{{$job->company->title}}" />
             </div>
             <div class="single-candidate-box-right">
                <h4>{{$job->title}}</h4>
                <p>{{$job->company->title}}</p>
                <div class="job-details-meta">
                   <!-- <p><i class="fa fa-file-text"></i> Applications 1</p> -->
                   <p><i class="fa fa-calendar"></i> {{$job->created_at->format('d-m-Y')}}</p>
                </div>
             </div>
          </div>
       </div>
       <div class="col-md-3 col-lg-6">
          <div class="single-candidate-action">
             <a href="{{route('company.show', $job->company->slug)}}" class="candidate-contact" target="_BLANK"><i class="fa fa-star"></i>Ver perfil de la empresa</a>
          </div>
       </div>
    </div>
 </div>
</section>
<!-- Single Candidate End -->


<!-- Single Candidate Bottom Start -->
<section class="single-candidate-bottom-area section_70">
 <div class="container">
    <div class="row">
       <div class="col-md-8 col-lg-9">
          <div class="single-candidate-bottom-left">
            @if(session('message'))
              <div class="alert alert-{{ session('message')['status'] }} alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                 {{ session('message')['message'] }}
              </div>
            @endif
               
             <div class="single-candidate-widget">
                <h3>Descripción de la oferta de empleo</h3>
                <p>{{$job->description}}</p>
             </div>
             <!-- <div class="single-candidate-widget clearfix">
                <h3>Comparte este post</h3>
                <ul class="share-job">
                   <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                   <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                   <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                   <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                </ul>
             </div> -->
             <div class="single-candidate-widget">
                <h3>Ofertas similares</h3>
                
                @forelse($related as $related)
                @include('job.related-card')
                @empty
                Ninguna oferta similar por el momento
                @endforelse
                
             </div>
          </div>
       </div>
       <div class="col-md-4 col-lg-3">
          <div class="single-candidate-bottom-right">
             @include('partials.job.apply_button')
             <div class="single-candidate-widget-2">
                <h3>Detalles del trabajo</h3>
                <ul class="job-overview">
                   <li>
                      <h4><i class="fa fa-briefcase"></i> Salario ofrecido</h4>
                      <p>S/{{round($job->min_salary, 0)}} - S/{{round($job->max_salary, 0)}}</p>
                   </li>
                   <li>
                      <h4><i class="fa fa-map-marker"></i> Ubicación</h4>
                      <p>{{$job->province->province}}, {{$job->province->department->department}}</p>
                   </li>
                   <li>
                      <h4><i class="fa fa-thumb-tack"></i> Tipo de trabajo</h4>
                      <p>{{$job->jobType->job_type}}</p>
                   </li>
                   <li>
                      <h4><i class="fa fa-clock-o"></i> Fecha de publicación</h4>
                      <p>{{$job->created_at->format('d/m/Y')}}</p>
                   </li>
                </ul>
             </div>
             <!-- @ include('job.fast_contact') -->
          </div>
       </div>
    </div>
 </div>
</section>
<!-- Single Candidate Bottom End -->

@endsection

@push('scripts')

@endpush