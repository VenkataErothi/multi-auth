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
                  <h3>Add User
                  </h3>
                  @if ($message = Session::get('success'))
                  <div class="alert alert-success">
                     <p>{{ $message }}</p>
                  </div>
                  @endif
               </div>
               <div class="card-body">
                  <form action="{{route('users.store')}}" method="POST" enctype="multipart/form-data">
                     @csrf
                     <div class="row">
                        <div class=" mb-3">
                           <label>Name:</label>
                           <input type="text" name="name" value= "{{ old('name') }}" class="form-control" placeholder="Name">
                           @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class=" mb-3">
                           <label>Email:</label>
                           <input type="text" name="email" value= "{{ old('email') }}" class="form-control" placeholder="email">
                           @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class=" mb-3">
                           <label>Password:</label>
                           <input type="password" name="password"  class="form-control" placeholder="Enter password">
                           @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class=" mb-3">
                           <label>Roles:</label>
                           <select name="role" id="role">
                              <option value="admin">Admin</option>
                              <option value="non admin">Non Admin</option>
                              <option value="user">User</option>
                           </select>
                           @error('role') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                           <button type="submit" class="btn btn-primary">Save</button>
                           <a href="{{ route('users.index') }}" class="btn btn-danger">Close</a>
                        </div>
                  </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <script>  
        $(document).ready(function () {  
            $(".name").keyup(function () {
            var str = $(this).val();
            str = str.charAt(0).toUpperCase() + str.slice(1);
            $(this).val(str);   
            });  
        });  
    </script>
   </body>
</html>