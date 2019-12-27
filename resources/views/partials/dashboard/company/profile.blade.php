<div class="col-md-12 col-lg-9">
   <div class="dashboard-right">
      <div class="candidate-profile">
         @if(session('message'))
           <div class="alert alert-{{ session('message')['status'] }} alert-dismissible">
             <button type="button" class="close" data-dismiss="alert">&times;</button>
              {{ session('message')['message'] }}
           </div>
         @endif
         <div class="candidate-single-profile-info">
            <form method="POST" action="{{route('company.profile.update')}}"enctype="multipart/form-data" novalidate>
               @csrf
               @method('PUT')
               <div class="single-resume-feild resume-avatar">
                  <div class="resume-image company-resume-image">
                     <img src="{{auth()->user()->pathAttachment()}}" alt="{{auth()->user()->company->title}}">
                     <div class="resume-avatar-hover">
                        <div class="resume-avatar-upload">
                           <p>
                              <i class="fa fa-pencil"></i>
                              Actualizar
                           </p>
                           <input type="file" name="picture" id="picture">
                        </div>
                     </div>
                  </div>
               </div>

            <!-- </form> -->
         </div>
         <div class="candidate-single-profile-info">
               <div class="resume-box">
                  <h3>Perfil de empresa</h3>
                  <div class="single-resume-feild feild-flex-2">
                     <div class="single-input">
                        <label for="title">Nombre de empresa</label>
                        <input type="text" id="title" name="title" value="{{ old('title') ?: auth()->user()->company->title}}">
                     </div>
                     <div class="single-input">
                        <label for="sector_id">Sector al que pertenece</label>
                        <select id="sector_id" name="sector_id">
                           <option value="">Sector</option>
                           @foreach(\App\Sector::orderBy('sector')->pluck('sector', 'id') as $id => $sector)
                                <option {{ (int) old('sector_id') === $id || auth()->user()->company->sector_id === $id ? 'selected' : '' }} value="{{ $id }}">
                                    {{ $sector }}
                                </option>
                           @endforeach
                        </select>
                     </div>
                  </div>
                  <div class="single-resume-feild ">
                     <div class="single-input">
                        <label for="biography">Biografía</label>
                        <textarea id="biography" name="biography">{{ old('biography') ?: auth()->user()->company->biography}}</textarea>
                     </div>
                  </div>
               </div>
               <div class="resume-box">
                  <h3>Información de contacto</h3>
                  <div class="single-resume-feild feild-flex-2">
                     <div class="single-input">
                        <label for="phone">Teléfono</label>
                        <input type="text" id="phone" name="phone" value="{{old('phone') ?: auth()->user()->company->phone}}">
                     </div>
                     <div class="single-input">
                        <label for="address">Dirección</label>
                        <input type="text" id="addres" name="address" value="{{ old('address') ?: auth()->user()->company->address}}">
                     </div>
                  </div>
                  <div class="single-resume-feild feild-flex-2">
                     <div class="single-input">
                        <label for="department_id">Departamento</label>
                        <select id="department_id" name="department_id">
                           <option value="">Departamento</option>
                           @foreach(\App\Department::orderBy('department')->pluck('department', 'id') as $id => $department)
                                <option {{ (int) old('department_id') === $id || auth()->user()->company->province->department->id === $id ? 'selected' : '' }} value="{{ $id }}">
                                    {{ $department }}
                                </option>
                           @endforeach
                        </select>
                     </div>
                     <div class="single-input">
                        <label for="province_id">Provincia</label>
                        <select id="province_id" name="province_id">
                           <option value="">Provincia</option>
                           @foreach(\App\Province::orderBy('province')->whereDepartmentId(auth()->user()->company->province->department->id)->pluck('province', 'id') as $id => $province)
                                <option {{ (int) old('province_id') === $id || auth()->user()->company->province_id === $id ? 'selected' : '' }} value="{{ $id }}">
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