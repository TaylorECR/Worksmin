<div class="col-md-12 col-lg-9">
   <div class="dashboard-right">
      <div class="welcome-dashboard">
         <h3>Bienvenido <span>{{auth()->user()->company->title}}</span></h3>
      </div>
      <div class="row">
         <div class="col-lg-4 col-md-12">
            <div class="widget_card_page grid_flex widget_bg_blue">
               <div class="widget-icon">
                  <i class="fa fa-gavel"></i>
               </div>
               <div class="widget-page-text">
                  <h4>{{auth()->user()->company->jobs_count}}</h4>
                  <h2>Ofertas</h2>
               </div>
            </div>
         </div>
         <div class="col-lg-4 col-md-12">
            <div class="widget_card_page grid_flex widget_bg_dark_red">
               <div class="widget-icon">
                  <i class="fa fa-users"></i>
               </div>
               <div class="widget-page-text">
                  <h4>{{$candidates->count()}}</h4>
                  <h2>Candidatos</h2>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
