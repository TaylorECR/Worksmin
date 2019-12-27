<label for="company_id" class="">Compañia</label>
<select name="company_id" id="company_id" class="form-control">
	@foreach(\App\Company::orderBy('title')->pluck('title', 'id') as $id => $company)
    <option {{ (int) old('company_id') === $id || $offert->company_id === $id ? 'selected' : '' }} value="{{ $id }}">
        {{ $company }}
    </option>
    @endforeach
</select>
