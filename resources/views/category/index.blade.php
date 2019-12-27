@extends('layouts.app')

@push('styles')

@endpush

@section('content')

@include('partials.shared.breadcrumb', ['page' => "Busca por categorías"])

<!-- Categories Area Start -->
<section class="jobguru-categories-area browse-category-page section_70">
 <div class="container">
    <div class="row">
       <div class="col-md-12">
          <div class="all-sub-category clearfix">
			      @foreach($categories as $category)
             <div class="search-category-box">
                <h3>{{$category->category}}</h3>
                <ul class="list_category">
                	@foreach($category->subcategories as $subcategory)
                   <li class="in checkbox">
                      <input class="checkbox-spin" type="checkbox" id="subcategory_{{$subcategory->id}}" data-subcategory="{{$subcategory->id}}">
                      <label for="subcategory_{{$subcategory->id}}"><span></span>{{$subcategory->subcategory}}</label>
                   </li>
                   @endforeach
                </ul>
             </div>
            @endforeach
          </div>
       </div>
    </div>
 </div>
</section>
<!-- Categories Area End -->

@endsection

@push('scripts')

<script>

  var type = [];
  $('input[type="checkbox"]').click(function(){
    var value = $(this).data('subcategory');
      
    if($(this).prop("checked")){
        type.push(value);
      }
      else if(!$(this).prop("checked")){
        pos = type.indexOf(value);
        type.splice(pos, 1); 
      }
    console.log(type);
    var data = {
      title: 'subcategory',
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
        window.location = res;
      }
    })
  }
</script>
@endpush
