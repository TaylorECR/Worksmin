@extends('layouts.app-admin')

@push('styles')

@endpush

@section('content')

@include('admin.partials.breadcrumb', ['icon' => "pe-7s-ribbon", 
										'title' => "Administra las empresas", 
										'description' => "Crea, edita o elimina las actuales empresas registradas"])

     
@if (session('status'))
        
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>¡FELICIDADES!</strong> {{ session('status') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

<div class="main-card mb-3 card">
    <div class="card-body"><h5 class="card-title">Crear empresa</h5>
        <form 
            class="" 
            method="POST" 
            action="{{ ! $company->id ? route('admin.company.store') : route('admin.company.update', ['slug' => $company->slug])}}"
            >

            @if($company->id)
                @method('PUT')
            @endif
            @csrf

            <div class="position-relative form-group">
                <div class="position-relative form-group">
                    <label for="title" class="">Razon social de la empresa</label>
                    <input name="title" id="title" placeholder="Razón social" type="text" class="form-control" value="{{ old('title') ?: $company->title }}">
                </div>
            </div>
            <div class="position-relative form-group">
                <div class="position-relative form-group">
                    <label for="biography" class="">Biografía de la empresa</label>
                    <textarea name="biography" id="biography" class="form-control" cols="50">{{ old('biography') ?: $company->biography }}</textarea>
                </div>
            </div>
            <div class="position-relative form-group">
                <div class="position-relative form-group">
                    <label for="website" class="">Website de la empresa</label>
                    <input name="website" id="website" placeholder="URL de pagina web" type="text" class="form-control" value="{{ old('website') ?: $company->website }}">
                </div>
            </div>
            <button class="mt-2 btn btn-primary">{{$btnText}}</button>
        </form>
    </div>
</div>


@endsection


@push('scripts')

@endpush
