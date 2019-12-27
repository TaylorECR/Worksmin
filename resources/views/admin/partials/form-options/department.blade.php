<label for="location_id" class="">Departamento</label>
<select name="location_id" id="location_id" class="form-control">
    @foreach(\App\Location::orderBy('department')->pluck('department', 'id') as $id => $location)
    <option {{ (int) old('location_id') === $id || $offert->location_id === $id ? 'selected' : '' }} value="{{ $id }}">
        {{ $location }}
    </option>
    @endforeach
</select>