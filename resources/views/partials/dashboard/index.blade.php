@extends('layouts.app')

@section('content')

@include('partials.shared.breadcrumb', ['page' => "Dashboard"])
<!-- Candidate Dashboard Area Start -->
<section class="candidate-dashboard-area section_70">
 <div class="container">
    <div class="row">

      @include('partials.dashboard.'.\App\User::navigation().'.sidebar')
       
      @include('partials.dashboard.'.\App\User::navigation().'.'.$word)
      
    </div>
 </div>
</section>
<!-- Candidate Dashboard Area End -->

@endsection

@if(auth()->user()->company)
@push('scripts')
<script>
	$(document).ready(function(){
		$("#department_id").on("change", function(){
			var department_id = $(this).val();
			var data = {
		      title: 'department',
		      value: department_id
		    }

		    $.ajax({
		      url: '{{ route('second.ajax') }}',
		      type: 'POST',
		      headers: {
		          'x-csrf-token': $("meta[name=csrf-token]").attr('content')
		      },
		      data: {
		          data: data
		      },
		      success: (res) => {
		        $('#province_id option').remove();
		        $('#province_id').append('<option value="">Provincia</option>');
		        $.each(res, function( index, value ) {
		        	var provice = `<option value='${value.id}'>${value.province}</option>`
		        	$('#province_id').append(provice);
				});
		      }
		    })
		})


		$("#category_id").on("change", function(){
			var category_id = $(this).val();
			var data = {
		      title: 'category',
		      value: category_id
		    }

		    $.ajax({
		      url: '{{ route('second.ajax') }}',
		      type: 'POST',
		      headers: {
		          'x-csrf-token': $("meta[name=csrf-token]").attr('content')
		      },
		      data: {
		          data: data
		      },
		      success: (res) => {
		        $('#subcategory_id option').remove();
		        $('#subcategory_id').append('<option value="">Subcategoria</option>');
		        $.each(res, function( index, value ) {
		        	var provice = `<option value='${value.id}'>${value.subcategory}</option>`
		        	$('#subcategory_id').append(provice);
				});
		      }
		    })
		})
	})
</script>
@endpush
@endif