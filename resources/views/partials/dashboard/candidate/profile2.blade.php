<div class="col-lg-9 col-md-12">
   <div class="dashboard-right">
      <div class="candidate-profile">
         <div class="candidate-single-profile-info">
            <div class="single-resume-feild resume-avatar">
               <div class="resume-image">
                  <img src="{{auth()->user()->pathAttachment()}}" alt="{{auth()->user()->candidate->name}}">
                  <div class="resume-avatar-hover">
                     <div class="resume-avatar-upload">
                        <p>
                           <i class="fa fa-pencil"></i>
                           Editar
                        </p>
                        <input type="file" name="picture">
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="candidate-single-profile-info">
            <form method="POST" action="{{route('update.candidate.profile', auth()->user()->candidate->id)}}" novalidate>
              @csrf
               <div class="resume-box">
                  <h3>Mi perfil</h3>
                  <div class="single-resume-feild feild-flex-2">
                     <div class="single-input">
                        <label for="name">Nombre</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?: auth()->user()->candidate->name }}" autocomplete="false">
                         @error('name')
                         <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                         </span>
                         @enderror
                     </div>
                     <div class="single-input">
                        <label for="last_name">Apellido</label>
                        <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') ?: auth()->user()->candidate->last_name }}" autocomplete="false">
                         @error('last_name')
                         <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                         </span>
                         @enderror
                     </div>
                  </div>
                  <div class="single-resume-feild feild-flex-2">
                     <div class="single-input">
                        <label for="professional_title">Titulo profesional</label>
                        <input id="professional_title" type="text" class="form-control @error('professional_title') is-invalid @enderror" name="professional_title" value="{{ old('professional_title') ?: auth()->user()->candidate->professional_title }}" autocomplete="false">
                         @error('professional_title')
                         <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                         </span>
                         @enderror
                     </div>
                     <div class="single-input single-job-sidebar sidebar-keywords">
                        <label for="languages">Idiomas</label>
                        <select class="sidebar-category-select" name="languages[]" multiple="multiple" id="languages">
                           <option value="1" 
                           @php

                           for($i = 0; $i < count(json_decode(auth()->user()->candidate->languages, true)) ; $i++)
                           {
                              if (json_decode(auth()->user()->candidate->languages, true)[$i] == 1){
                                echo 'selected';
                              }
                           }

                           @endphp
                           >Español</option>
                           <option value="2"
                           @php

                           for($i = 0; $i < count(json_decode(auth()->user()->candidate->languages, true)) ; $i++)
                           {
                              if (json_decode(auth()->user()->candidate->languages, true)[$i] == 2){
                                echo 'selected';
                              }
                           }

                           @endphp
                           >Inglés</option>
                           <option value="3"
                            @php

                           for($i = 0; $i < count(json_decode(auth()->user()->candidate->languages, true)) ; $i++)
                           {
                              if (json_decode(auth()->user()->candidate->languages, true)[$i] == 3){
                                echo 'selected';
                              }
                           }

                           @endphp
                           >Francés</option>
                        </select>
                     </div>
                  </div>
                  <div class="single-resume-feild ">
                     <div class="single-input">
                        <label for="biography">Biografía</label>
                        <textarea id="biography" class="form-control" name="biography">{{ old('biography') ?: auth()->user()->candidate->biography }}</textarea>
                     </div>
                  </div>
               </div>
               <div class="resume-box">
                  <h3>Información de contacto</h3>
                  <div class="single-resume-feild feild-flex-2">
                     <div class="single-input">
                        <label for="phone">Teléfono</label>
                        <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') ?: auth()->user()->candidate->phone }}" autocomplete="false">
                         @error('phone')
                         <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                         </span>
                         @enderror
                     </div>
                     <div class="single-input">
                        <label for="address">Dirección</label>
                        <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') ?: auth()->user()->candidate->address }}" autocomplete="false">
                         @error('address')
                         <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                         </span>
                         @enderror
                     </div>
                  </div>
                  <div class="single-resume-feild feild-flex-2">
                     <div class="single-input">
                        <label for="department_id">Departamento</label>
                        <select id="department_id" name="department_id" class="form-control">
                           @foreach(\App\Department::orderBy('department')->pluck('department', 'id') as $id => $department)
                             <option {{ (int) old('department_id') === $id || auth()->user()->candidate->department_id === $id ? 'selected' : '' }} value="{{ $id }}">
                                 {{ $department }}
                             </option>
                            @endforeach
                        </select>
                     </div>
                     <div class="single-input">
                        <label for="province_id">Departamento</label>
                        <select id="province_id" name="province_id" class="form-control">
                           @foreach(\App\province::orderBy('province')->pluck('province', 'id') as $id => $province)
                             <option {{ (int) old('province_id') === $id || auth()->user()->candidate->province_id === $id ? 'selected' : '' }} value="{{ $id }}">
                                 {{ $province }}
                             </option>
                            @endforeach
                        </select>
                     </div>
                  </div>
               </div>
               <div class="submit-resume">
                  <button type="submit">Actualizar</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>