@extends('layouts.home-app')

@push('styles')

@endpush

@section('content')

<!--Home Video Start-->
<section class="home-video-banner parallax" data-src="assets/img/slider-1.jpeg" data-jarallax-video="https://www.youtube.com/watch?v=zAZQl0VmPcs&feature=youtu.be',containment:'#welcome-video', showControls:false, autoPlay:true, mute:true, loop:true, startAt:0, quality:'default', opacity:1,}">
   <div class="banner-area">
      <div class="banner-caption container">
         <div class="container">
            <div class="row">
               <div class="col-md-12 col-sm-12 content-home">
                  <div class="banner-welcome">
                     <h4><span>trabajos en minería</span> en todo el Perú</h4>
                     <form action="{{route('job.keyword.category.post')}}" method="POST">
                        @csrf
                        <div class="video-banner-input">
                           <input type="text" placeholder="Titulo, palabra o frase" name="keyword" autofocus>
                        </div>
                        <div class="video-banner-input">
                           <!-- <input type="text" placeholder="Ciudad o departamento"> -->
                           <select name="category_id" id="category_id">
                            <option value="">Selecciona una categoría</option>
                           @foreach(\App\Category::orderBy('category')->pluck('category', 'id') as $id => $category)
                              <option {{(int) old('category_id') === $id ? 'selected' : ''}} value="{{ $id }}">
                                  {{ $category }}
                              </option>
                           @endforeach
                           </select>
                        </div>
                        <div class="video-banner-input">
                           <button type="submit"><i class="fa fa-search"></i></button>
                        </div>
                     </form>
                     <!-- <div class="top-search-cat">
                        <p>Top Search :</p>
                        <a href="#">Design</a>
                        <a href="#">Analysis</a>
                        <a href="#">training</a>
                        <a href="#">Music</a>
                     </div> -->
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!--Home Video End-->

<!-- Categories Area Start -->
<section class="jobguru-categories-area section_70">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="site-heading">
               <h2><span>Categorías </span>más demandadas</h2>
               <p>A better career is out there. We'll help you find it. We're your first step to becoming everything you want to be.</p>
            </div>
         </div>
      </div>
      <div class="row">

        

        @for($i=0; $i < 4 ; $i++)
            <div class="col-lg-3 col-md-6 col-sm-6">
              <a href="{{route('job.by.category', $categories[$i]->slug)}}" class="single-category-holder account_cat">
                 <div class="category-holder-icon">
                    <i class="fa {{$categories[$i]->icon}}"></i>
                 </div>
                 <div class="category-holder-text">
                    <h3>{{$categories[$i]->category}}</h3>
                 </div>
                 <img src="assets/img/account_cat.jpg" alt="category" />
              </a>
           </div>
        @endfor

      </div>
      <div class="row">
        @for($i=4; $i < 8 ; $i++)
            <div class="col-lg-3 col-md-6 col-sm-6">
              <a href="{{route('job.by.category', $categories[$i]->slug)}}" class="single-category-holder account_cat">
                 <div class="category-holder-icon">
                    <i class="fa {{$categories[$i]->icon}}"></i>
                 </div>
                 <div class="category-holder-text">
                    <h3>{{$categories[$i]->category}}</h3>
                 </div>
                 <img src="assets/img/account_cat.jpg" alt="category" />
              </a>
           </div>
        @endfor
      </div>
      <div class="row">
         <div class="col-md-12">
            <div class="load-more">
               <a href="{{route('category.index')}}" class="jobguru-btn">Todas las categorías</a>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- Categories Area End -->
 
@auth

  @if(auth()->user()->candidate)
  <!-- Inner Hire Area Start -->
  <section class="jobguru-inner-hire-area section_100">
     <div class="hire_circle"></div>
     <div class="container">
        <div class="row">
           <div class="col-md-12">
              <div class="inner-hire-left">
                 <h3>Más de 5000 ofertas de empleo</h3>
                 <p>placerat congue dui rhoncus sem et blandit .et consectetur Fusce nec nunc lobortis lorem ultrices facilisis. Ut dapibus placerat blandit nunc.congue dui rhoncus sem et blandit .et consectetur Fusce nec nunc lobortis lorem ultrices facilisis. Ut dapibus placerat blandi </p>
                 <a href="{{route('job.index')}}" class="jobguru-btn-3">Ver ofertas de empleo</a>
              </div>
           </div>
        </div>
     </div>
  </section>
  <!-- Inner Hire Area End -->
  @else
  <!-- Inner Hire Area Start -->
  <section class="jobguru-inner-hire-area section_100">
     <div class="hire_circle"></div>
     <div class="container">
        <div class="row">
           <div class="col-md-12">
              <div class="inner-hire-left">
                 <h3>Más de 2000 postulantes</h3>
                 <p>placerat congue dui rhoncus sem et blandit .et consectetur Fusce nec nunc lobortis lorem ultrices facilisis. Ut dapibus placerat blandit nunc.congue dui rhoncus sem et blandit .et consectetur Fusce nec nunc lobortis lorem ultrices facilisis. Ut dapibus placerat blandi </p>
                 <a href="{{route('job.index')}}" class="jobguru-btn-3">Publica tu oferta</a>
              </div>
           </div>
        </div>
     </div>
  </section>
  <!-- Inner Hire Area End -->
  @endif


@else

<!-- Inner Hire Area Start -->
<section class="jobguru-inner-hire-area section_100">
   <div class="hire_circle"></div>
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="inner-hire-left">
               <h3>Necesitas contratar</h3>
               <p>placerat congue dui rhoncus sem et blandit .et consectetur Fusce nec nunc lobortis lorem ultrices facilisis. Ut dapibus placerat blandit nunc.congue dui rhoncus sem et blandit .et consectetur Fusce nec nunc lobortis lorem ultrices facilisis. Ut dapibus placerat blandi </p>
               <a href="{{route('company.register')}}" class="jobguru-btn-3">Ingresa como empresa</a>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- Inner Hire Area End -->

@endauth
 
 
<!-- Job Tab Area Start -->
<section class="jobguru-job-tab-area section_70">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="site-heading">
               <h2>Empresas & <span>ofertas laborales</span></h2>
               <p>It's easy. Simply post a job you need completed and receive competitive bids from freelancers within minutes</p>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-md-12">
            <div class=" job-tab">
               <ul class="nav nav-pills job-tab-switch" id="pills-tab" role="tablist">
                  <li class="nav-item">
                     <a class="nav-link" id="pills-companies-tab" data-toggle="pill" href="#pills-companies" role="tab" aria-controls="pills-companies" aria-selected="true">Empresas</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link active" id="pills-job-tab" data-toggle="pill" href="#pills-job" role="tab" aria-controls="pills-job" aria-selected="false">Ofertas nuevas</a>
                  </li>
               </ul>
            </div>
            <div class="tab-content" id="pills-tabContent">
               <div class="tab-pane fade" id="pills-companies" role="tabpanel" aria-labelledby="pills-companies-tab">
                  <div class="top-company-tab">
                     <ul>

                        @foreach($companies as $company)

                          @include('home.top-company-card')
                          
                        @endforeach
                        
                     </ul>
                  </div>
               </div>
               <div class="tab-pane fade show active" id="pills-job" role="tabpanel" aria-labelledby="pills-job-tab">
                  <div class="top-company-tab">
                     <ul>

                        @foreach($jobs as $job)

                          @include('home.job-card')

                        @endforeach

                      </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-md-12">
            <div class="load-more">
               <a href="{{route('job.index')}}" class="jobguru-btn">Ver más ofertas de empleo</a>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- Job Tab Area End -->
 
 
<!-- Video Area Start -->
<section class="jobguru-video-area section_100">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="video-container">
               <h2>Encuentra a la persona indicada <br> para el puesto que requieres.</h2>
               <div class="video-btn">
                  <a class="popup-youtube" href="https://www.youtube.com/watch?v=k-R6AFn9-ek">
                  <i class="fa fa-play"></i>
                  Descubre cómo
                  </a>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- Video Area End -->
 
 
<!-- How Works Area Start -->
<section class="how-works-area section_70">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="site-heading">
               <h2>¿Cómo <span>funciona?</span></h2>
               <p>It's easy. Simply post a job you need completed and receive competitive bids from freelancers within minutes</p>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-md-4">
            <div class="how-works-box box-1">
               <img src="assets/img/arrow-right-top.png" alt="works" />
               <div class="works-box-icon">
                  <i class="fa fa-user"></i>
               </div>
               <div class="works-box-text">
                  <p>Ingresa</p>
               </div>
            </div>
         </div>
         <div class="col-md-4">
            <div class="how-works-box box-2">
               <img src="assets/img/arrow-right-bottom.png" alt="works" />
               <div class="works-box-icon">
                  <i class="fa fa-gavel"></i>
               </div>
               <div class="works-box-text">
                  <p>Publica una oferta</p>
               </div>
            </div>
         </div>
         <div class="col-md-4">
            <div class="how-works-box box-3">
               <div class="works-box-icon">
                  <i class="fa fa-thumbs-up"></i>
               </div>
               <div class="works-box-text">
                  <p>Elije</p>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- How Works Area End -->
       


@endsection


@push('scripts')

@endpush
