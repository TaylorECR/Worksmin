<div class="single-candidate-widget-2">
  <h3>Contacto rápido</h3>
  <form method="POST" action="{{route('job.fast_mail', $job->slug)}}">
    @csrf
     <p>
        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" placeholder="Nombre completo">
        @error('name')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
        @enderror
     </p>
     <p>
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" placeholder="Correo electrónico">
        @error('email')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
        @enderror
     </p>
     <p>
        <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" autocomplete="phone" placeholder="Teléfono">
        @error('phone')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
        @enderror
     </p>
     <p>
        <textarea name="message" placeholder="Mensaje" class="form-control @error('message') is-invalid @enderror">{{ old('message') }}</textarea>
        @error('message')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
        @enderror
     </p>
     <p>
        <div class="product-upload">
         <p>
            <i class="fa fa-upload"></i>
            Adjunta tu CV (.pdf)
         </p>
         <input type="file" class="form-control @error('cv') is-invalid @enderror" name="cv">
        @error('cv')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
        @enderror
        </div>
     </p>
     <p>
        <button type="submit">Enviar mensaje</button>
     </p>
  </form>
</div>