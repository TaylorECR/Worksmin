<label for="area_id" class="">Categoria</label>
<select name="area_id" id="area_id" class="form-control">
	@foreach(\App\Area::orderBy('area')->pluck('area', 'id') as $id => $area)
    <option {{ (int) old('area_id') === $id || $offert->area_id === $id ? 'selected' : '' }} value="{{ $id }}">
        {{ $area }}
    </option>
    @endforeach
</select>
