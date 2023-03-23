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
         <div class="col-lg-12 margin-tb">
            <h2>User</h2>
         </div>
      </div>
      @if ($message = Session::get('success'))
      <div class="alert alert-success">
         <p>{{ $message }}</p>
      </div>
      @endif
      <div class="bg-light p-4 rounded">
         <table class="table table-bordered table-striped table-sm">
            <thead>
               <tr>
                  <th>No</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Roles</th>
               </tr>
            </thead>
            <tbody class="searchResults">
               @foreach ($data as $user)
               <tr>
                  <td>{{$user->id}}</td>
                  <td>{{$user->name }}</td>
                  <td>{{$user->email }}</td>
                  <td>{{$user->role}}</td>
                  </td>                       
               </tr>
               @endforeach
            </tbody>
         </table>
         {{ $data->links() }} 
      </div>
   </div>
      <style >
      .w-5{
      display: none;
      }
   </body>
</html>