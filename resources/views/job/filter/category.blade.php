<!-- Single Job Sidebar Start -->
<div class="single-job-sidebar sidebar-category">
  <h3>Categoria</h3>
  <div class="job-sidebar-box">
     <form>
        <select class="sidebar-category-select-2 category_filter" name="category_id">
            <option value="">Categoria</option>
            @foreach(\App\Category::orderBy('category')->pluck('category', 'id') as $id => $category)
                <option value="{{ $id }}">
                    {{ $category }}
                </option>
            @endforeach
        </select>
     </form>
  </div>
</div>
<!-- Single Job Sidebar End -->