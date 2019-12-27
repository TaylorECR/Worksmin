@component('mail::message')
#{{"Nueva postulación desde la web de Agenda minera"}}
{{"Un postulante ha inviado su cv a la oferta "}} <b>{{$offert->title}} </b> {{"publicada. ¡¡FELICIDADES!!"}}

{{"Datos de contacto"}}<br>
{{"Correo: ".$mail}}<br>
{{"Telefono: ".$phone}}<br>

@component('mail::button', ['url' => url('storage/files/'.$cv)])

	{{"Ver CV"}}

@endcomponent

<br>

@component('mail::button', ['url' => url('/offert/'.$offert->slug)])

	{{"Ver oferta"}}

@endcomponent
{{"Gracias"}}, <br>
{{config('app.name')}}

@endcomponent