<div class="col-lg-9 col-md-12">
   <div class="dashboard-right">
      <div class="change-pass manage-jobs">
         <div class="manage-jobs-heading">
            <h3>Cambiar contraseña</h3>
         </div>
         <form method="POST" action="{{route(''.App\User::navigation().'.password.update')}}" novalidate>
            @csrf
            @method('PUT')
            <!-- <p>
               <label for="old_password">Contraseña antigua</label>
               <input type="password" id="old_password" class="form-control {{--$errors->has('old_password') ? 'is-invalid' : ''--}}" name="old_password" autofocus required>
               @ if(--$errors->has('old_password')--)
               <span class="invalid-feedback">
                  <strong>{{--$errors->firs('old_password')--}}</strong>
               </span>
               @ endif
            </p> -->
            <p>
               <label for="password">Nueva contraseña</label>
               <input type="password" id="password" class="form-control {{$errors->has('password') ? 'is-invalid' : ''}}" name="password" required>
               @if($errors->has('password'))
               <span class="invalid-feedback">
                  <strong>{{$errors->first('password')}}</strong>
               </span>
               @endif
            </p>
            <p>
               <label for="password_confirmation">Confirmar contraseña</label>
               <input type="password" id="password_confirmation" class="form-control {{$errors->has('password') ? 'is-invalid' : ''}}" name="password_confirmation" required>
               @if($errors->has('email'))
               <span class="invalid-feedback">
                  <strong>{{$errors->first('password_confirmation')}}</strong>
               </span>
               @endif
            </p>
            <p>
               <button type="submit">Actualizar</button>
            </p>
         </form>
      </div>
   </div>
</div>

