@include('sidebar')
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Authentication</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
     <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
      <script src="{{asset('js/employees-index.js')}}" defer></script>
   </head>
   <body>
      <div class="container">
      <div class="row">
         <div class="col-md-6 text center">
            <h2>Employees</h2>
         </div>
      </div>
         @if ($message = Session::get('success'))
         <div class="alert alert-success">
            <p>{{ $message }}</p>
         </div>
         @endif
         <div class="bg-light p-4 rounded">           
            <div class="mb-2">
               <form class="form-inline">
                  <input type="search" name="search" id="search" class="form-control float-end mx-2" placeholder="Search..." style="width: 230px" />
               </form>
            </div>
            <table class="table table-bordered table-striped table-sm ">
               <thead>
               <tr>
                  <th>No</th>
                  <th>EmployeeId</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Start date</th>
                  <th>Skills</th>
                  <th>Created At</th>
                  <th>Updated At</th>
                  <th>Created By</th>
                  <th>Updated By</th>
                   @if(Auth::user()->role == 'admin')
                  <th>Action</th>
                  @endif
               </tr>   
            </thead>
             <tbody class="searchResults">
               @foreach ($employees as $employee)
               <tr>
                  <td>{{ $employee->id }}</td>
                  <td>{{ $employee->employeeID }}</td>
                  <td>{{ $employee->first_name }}</td>
                  <td>{{ $employee->last_name }}</td>
                  <td>{{ $employee->start_date }}</td>
                  <td>{{ $employee->skills }}</td>
                  <td>{{ $employee->created_at }}</td>
                  <td>{{ $employee->updated_at }}</td>
                  <td>{{ $employee->user->name }}</td>
                  <td>{{ $employee->updated_by }}</td>
                  @if(Auth::user()->role == 'admin')
                  <td>
                     <a class="btn btn-info btn-sm" href="{{'show/'.$employee->id}}"><i class="fas fa-eye"></i>View</a>
                     <a class="btn btn-primary btn-sm" href="{{'edit/'.$employee->id}}"><i class="fas fa-edit"></i>Edit</a>
                  </td>
                  @endif
               </tr>
               @endforeach
            </tbody> 
            </table>
            <span>
            {{ $employees->links() }} 
            </span>
         </div>
      </div>
      <style >
         .w-5{
         display: none;
         }
      </style>
      <script type="text/javascript">
         var authCheck= '{{ Auth::user()->role }}';
         console.log(authCheck);
      </script>
      </body>
      </html>