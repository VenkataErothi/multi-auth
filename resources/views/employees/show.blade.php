@include('sidebar')
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Authentication</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
   </head>
   <body>
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="card">
                  <div class="card-header">
                     <div class="pull-left">
                        <h3> Show Employee
                           <a class="btn btn-primary btn-sm float-end" href="{{ route('employees.index') }}"> Back</a>
                        </h3>
                     </div>
                     @if ($message = Session::get('success'))
                     <div class="alert alert-success">
                        <p>{{ $message }}</p>
                     </div>
                     @endif
                  </div>
                  <div class="row">
                     <div class="mb-3">
                        <div class="form-group">
                           <label>EmployeeId:</label>
                           {{ $employee->employeeID }}
                        </div>
                     </div>
                     <div class="mb-3">
                        <div class="form-group">
                           <label>First Name:</label>
                           {{ $employee->first_name}}
                        </div>
                     </div>
                     <div class="mb-3">
                        <div class="form-group">
                           <label>Last Name:</label>
                           {{ $employee->last_name}}
                        </div>
                     </div>
                     <div class="mb-3">
                        <div class="form-group">
                           <label>Start date:</label>
                           {{ $employee->start_date}}
                        </div>
                     </div>
                     <div class="mb-3">
                        <div class="form-group">
                           <label>Skills:</label>
                           {{ $employee->skills}}
                        </div>
                     </div>
                     <div class="mb-3">
                        <div class="form-group">
                           <label>Created At:</label>
                           {{ $employee->created_at}}
                        </div>
                     </div>
                     <div class="mb-3">
                        <div class="form-group">
                           <label>Updated At:</label>
                           {{ $employee->updated_at }}
                        </div>
                     </div>
                      <div class="mb-3">
                        <div class="form-group">
                           <label>Created By:</label>
                           {{ $employee->user->name }}
                        </div>
                     </div>
                       <div class="mb-3">
                        <div class="form-group">
                           <label>Updated By:</label>
                           {{ $employee->updated_by }}
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </body>
</html>