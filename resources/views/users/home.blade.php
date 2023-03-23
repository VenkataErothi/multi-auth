@include('sidebar')
<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-8">
         <div class="card">
            <div class="card-header">{{ __('Dashboard')  }}</div>
            <div class="card-body">
               @if (session('message'))
               <div class="alert alert-success" role="alert">
                  {{ session('message') }}
               </div>
               @endif
               {{ __('You are logged in as user!') }}
            </div>
         </div>
      </div>
   </div>
</div>
