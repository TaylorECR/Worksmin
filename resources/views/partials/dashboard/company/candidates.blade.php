<div class="col-md-12 col-lg-9">
   <div class="dashboard-right">
      <div class="manage-jobs manage-candidates">
         <div class="manage-jobs-heading">
            <h3>{{$job->title}}: aplicantes</h3>
         </div>
      </div>
      <div class="candidate-list-page">
         @forelse($job->candidates as $candidate)
         <div class="single-candidate-list">
            <div class="main-comment">
               <div class="candidate-image">
                  <img src="{{$candidate->user->pathAttachment()}}" alt="author">
               </div>
               <div class="candidate-text">
                  <div class="candidate-info">
                     <div class="candidate-title">
                        <h3><a href="#">{{$candidate->name}}</a></h3>
                     </div>
                     <p>{{$candidate->professional_title}}</p>
                  </div>
                  <div class="candidate-text-inner">
                     {{str_limit($candidate->biography, 500)}}
                  </div>
                  <div class="candidate-text-bottom">
                     <div class="candidate-text-box">
                        <p class="company-state"><i class="fa fa-map-marker"></i> {{$candidate->province->department->department}}</p>
                     </div>
                     <div class="candidate-action">
                        <a href="#" class="jobguru-btn-2">Ver perfil</a>
                        <a href="#" class="jobguru-btn-danger">Cancel</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         @empty

         @endforelse
         <!-- End Single Candidate List -->
         {{--$job->links()--}}
         <!-- End Pagination -->
      </div>
   </div>
</div>
