@component('mail::message')
#{{__("Nueva postulación a tu oferta de empleo :job", ['job' => $job->title])}}
{{__("FELICIDADES, has recibido una postulación desde la web de Worksmin")}}
@component('mail::button', ['url' => url('/job/'.$job->slug)])
Ver offerta publicada
@endcomponent
<br>
{{__("Datos del postulante")}}
<br>
{{__("**Nombre:** :name, :last_name", ['name' => $candidate->name, 'last_name' => $candidate->last_name])}}
<br>
{{__("**Biografía:** :biography", ['biography' => $candidate->biography])}}
<br>
{{__("**Dirección:** :address", ['address' => $candidate->address])}}
<br>
{{__("**Teléfono:** :phone", ['phone' => $candidate->phone])}}
<br>
@component('mail::button', ['url' => url('#')])
Ver perfil completo
@endcomponent
{{__("Gracias")}}
{{config('app.name')}}
@endcomponent