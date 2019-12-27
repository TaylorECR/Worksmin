@extends('layouts.app')

@push('styles')

@endpush

@section('content')

@include('partials.shared.breadcrumb', ['page' => "Postea gratis"])

<!-- Candidate Dashboard Area Start -->
<section class="candidate-dashboard-area section_70">
   <div class="container">
      <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-md-12 col-lg-8">
        @include('partials.dashboard.free-post')
     	</div>
      </div>
   </div>
</section>
<!-- Candidate Dashboard Area End -->


@endsection


@push('scripts')

@endpush