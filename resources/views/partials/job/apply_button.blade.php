@auth
	@if(auth()->user()->candidate && $job->candidates->contains(auth()->user()->candidate->id))
	<div class="single-candidate-widget-2">
		<a href="javascript:void(0)" class="jobguru-btn-2">
			<i class="fa fa-check-circle"></i>
			Postulaste a este aviso
		</a>
	</div>
	@else
	<div class="single-candidate-widget-2">
		<a href="{{route('candidate.apply', $job->slug)}}" class="jobguru-btn-2">
			<i class="fa fa-paper-plane-o"></i>
			Aplicar ahora
		</a>
	</div>
	@endif
	
@else
	<div class="single-candidate-widget-2">
		<a href="{{route('candidate.apply', $job->slug)}}" class="jobguru-btn-2">
			<i class="fa fa-paper-plane-o"></i>
			Aplicar ahora
		</a>
	</div>
@endauth