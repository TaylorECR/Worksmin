@extends('layouts.app-admin')

@push('styles')

@endpush

@section('content')

@include('admin.partials.breadcrumb', ['icon' => "pe-7s-ribbon", 
										'title' => "Administra las ofertas", 
										'description' => "Crea, edita o elimina las actuales ofertas"])

     
@if (session('status'))
        
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>¡FELICIDADES!</strong> {{ session('status') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif


<div class="main-card mb-3 card">
    <div class="card-body"><h5 class="card-title">Crear oferta de empleo</h5>
        <form 
            class="" 
            method="POST" 
            action="{{ ! $offert->id ? route('admin.offert.store') : route('admin.offert.update', ['slug' => $offert->slug])}}"
            >

            @if($offert->id)
                @method('PUT')
            @endif
            @csrf

            <div class="form-row">
                <div class="col-md-6">
                    <div class="position-relative form-group">
                        @include('admin.partials.form-options.company')
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="position-relative form-group">
                        <label for="expiration_date" class="">Fecha de expiración</label>
                        <input name="expiration_date" id="expiration_date" placeholder="1234 Main St" type="date" class="form-control" value="{{ old('expiration_date') ?: $offert->expiration_date }}">
                    </div>
                </div>
            </div>
            <div class="position-relative form-group">
                <div class="position-relative form-group">
                    <label for="title" class="">Título de la oferta de empleo</label>
                    <input name="title" id="title" placeholder="Titulo de la oferta" type="text" class="form-control" value="{{ old('title') ?: $offert->title }}">
                </div>
            </div>
            <div class="position-relative form-group">
                <div class="position-relative form-group">
                    <label for="description" class="">Descripcion de la oferta de empleo</label>
                    <textarea name="description" id="description" class="form-control" cols="50">{{ old('description') ?: $offert->description }}</textarea>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6">
                    <div class="position-relative form-group">
                        @include('admin.partials.form-options.department')
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="position-relative form-group">
                        @include('admin.partials.form-options.category')
                    </div>
                </div>
                <!-- <div class="col-md-4">
                    <div class="position-relative form-group">
                        @ include('admin.partials.form-options.province')
                    </div>
                </div> -->
                <!-- <div class="col-md-2">
                    <div class="position-relative form-group">
                        <label for="exampleZip" class="">Zip</label>
                        <input name="zip" id="exampleZip" type="text" class="form-control">
                    </div>
                </div> -->
                <div class="col-md-2">
                    <div class="position-relative form-group">
                        @include('admin.partials.form-options.area')
                    </div>
                </div>
            </div>
            <button class="mt-2 btn btn-primary">{{$btnText}}</button>
        </form>
    </div>
</div>

@endsection


@push('scripts')

@endpush