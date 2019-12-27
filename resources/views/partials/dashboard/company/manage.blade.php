<div class="col-lg-9 col-md-12">
   <div class="dashboard-right">
      <div class="manage-jobs">
         @if(session('message'))
           <div class="alert alert-{{ session('message')['status'] }} alert-dismissible">
             <button type="button" class="close" data-dismiss="alert">&times;</button>
              {{ session('message')['message'] }}
           </div>
         @endif
         <div class="manage-jobs-heading">
            <h3>Mis ofertas de empleo publicadas</h3>
         </div>
         <div class="single-manage-jobs table-responsive">
            <table class="table">
               <thead>
                  <tr>
                     <th>Titulo</th>
                     <th>Publicado </th>
                     <th>Expira </th>
                     <th>Estado</th>
                     <th>Acciones</th>
                  </tr>
               </thead>
               <tbody>
                  @foreach($jobs as $job)
                  <tr>
                     <td class="manage-jobs-title"><a href="#">{{$job->title}}</a></td>
                     <td class="table-date">{{$job->created_at->format('d/m/Y')}}</td>
                     <td class="table-date">{{$job->expiration_date}}</td>
                     <td><span class="pending">{{$job->status()}}</span></td>
                     <td class="action">
                        <a href="{{route('company.dashboard.candidates', $job->slug)}}" class="action-edit" title="Ver postulantes"><i class="fa fa-users"></i></a>
                        <a href="{{route('company.job.edit', $job->slug)}}" class="action-edit" title="Editar"><i class="fa fa-pencil-square-o"></i></a>
                        <a href="{{ route('company.job.delete', $job->slug) }}"  
                           class="action-delete" 
                           title="Eliminar"
                           onclick="event.preventDefault();
                            document.getElementById('delete-job-form').submit();"
                         >
                             <i class="fa fa-trash-o"></i>
                         </a>
                        <form id="delete-job-form" action="{{ route('company.job.delete', $job->slug) }}" method="POST" style="display: none;">
                             @csrf
                             @method('DELETE')
                         </form>
                     </td>
                  </tr>
                  @endforeach
               </tbody>
            </table>
            {{$jobs->links()}}
         </div>
      </div>
   </div>
</div>
