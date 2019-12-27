<label for="category_id" class="">Categoria</label>
<select name="category_id" id="category_id" class="form-control">
	@foreach(\App\Category::orderBy('category')->pluck('category', 'id') as $id => $category)
    <option {{ (int) old('category_id') === $id || $offert->category_id === $id ? 'selected' : '' }} value="{{ $id }}">
        {{ $category }}
    </option>
    @endforeach
</select>
