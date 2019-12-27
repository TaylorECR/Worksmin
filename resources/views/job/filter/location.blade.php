<!-- Single Job Sidebar Start -->
<div class="single-job-sidebar sidebar-category">
  <h3>Departamento</h3>
  <div class="job-sidebar-box">
     <form>
        <select class="sidebar-category-select-3 department_filter" name="department_id">
            <option value="">Departamento</option>
            @foreach(\App\Department::orderBy('department')->pluck('department', 'id') as $id => $department)
                <option value="{{ $id }}">
                    {{ $department }}
                </option>
            @endforeach
        </select>
     </form>
  </div>
</div>
<!-- Single Job Sidebar End -->