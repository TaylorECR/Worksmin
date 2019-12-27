@extends('layouts.app')

@push('styles')

@endpush

@section('content')

@include('partials.shared.breadcrumb', ['page' => "Los mejores empleos en minería"])

<!-- Top Job Area Start -->
<section class="jobguru-top-job-area browse-page section_70">
 <div class="container">
    <div class="row">

       @include('job.filter')

       <div class="col-md-12 col-lg-9">
          <div class="job-grid-right">
             <div class="browse-job-head-option">
                <div class="job-browse-search">
                   <form method="POST" action="{{route('job.keyword.category.post')}}">
                      @csrf
                      <input type="search" placeholder="Busca un empleo..." name="keyword">
                      <input type="hidden" name="category_id" value="">
                      <button type="submit"><i class="fa fa-search"></i></button>
                   </form>
                </div>
                <!-- <div class="job-browse-action">
                   <div class="email-alerts">
                      <input type="checkbox" class="styled" id="b_1">
                      <label class="styled" for="b_1">email alerts for this search</label>
                   </div>
                   <div class="dropdown">
                      <button class="btn-dropdown dropdown-toggle" type="button" id="dropdowncur" data-toggle="dropdown" aria-haspopup="true">Short By</button>
                      <ul class="dropdown-menu" aria-labelledby="dropdowncur">
                         <li>Newest</li>
                         <li>Oldest</li>
                         <li>Random</li>
                      </ul>
                   </div>
                </div> -->
             </div>
             <!-- end job head -->
             <div class="job-sidebar-list-single">

              @foreach($jobs as $job)
                
				      @include('job.list-card')

              @endforeach

             </div>
             <!-- end job sidebar list -->
             {{ $jobs->links() }}
             <!-- end pagination -->
          </div>
       </div>
    </div>
 </div>
</section>
<!-- Top Job Area End -->

@endsection

@push('scripts')

<script>
  $('.date_filter').on('click', function(){
    var value = $(this).val();
    var data = {
      title: 'date',
      value: value
    }
    ajax(data);
  })

  $('.category_filter').on('change', function(){
    var value = $(this).val();
    var data = {
      title: 'category',
      value: value
    }
    ajax(data);
  })

  $('.department_filter').on('change', function(){
    var value = $(this).val();
    var data = {
      title: 'department',
      value: value
    }
    ajax(data);
  })

  var type = [];
  $('input[type="checkbox"]').click(function(){
    var value = $(this).val();
      
    if($(this).prop("checked")){
        type.push(value);
      }
      else if(!$(this).prop("checked")){
        pos = type.indexOf(value);
        type.splice(pos, 1); 
      }
    var data = {
      title: 'type',
      value: type
    }
    setTimeout(function(){
      ajax(data)
    }, 5000);
    
  });

  function ajax(data){
    jQuery.ajax({
      url: '{{ route('search.ajax') }}',
      type: 'POST',
      headers: {
          'x-csrf-token': $("meta[name=csrf-token]").attr('content')
      },
      data: {
          data: data
      },
      success: (res) => {
        console.log(res);
        // window.location = res;
      }
    })
  }
</script>

@endpush