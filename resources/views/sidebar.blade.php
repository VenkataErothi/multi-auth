@extends('layouts.app')
@section('content')
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
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/">
      <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
      <link rel='stylesheet' href="{{asset('css/sidebar.css')}}">
      <script src="{{asset('js/sidebar.js')}}" defer></script>
   </head>
   <body>
      <div id="mySidebar" class="sidebar open">
         <a href="javascript:void(0)" class="openbtn" onclick="openNav()">☰</a>
         <div class="icon-link">
            <a href="#">
            <i class='bx bx-collection' ></i>
            <span class="link_name_welcome">Welcome</span>    
            {{Auth::user()->name}}
            </a>
            <i class='bx bxs-chevron-down arrow' ></i>
         </div>
         <ul class="nav-links">
            <li>
               <div class="icon-link">
                  <a href="#">
                  <i class='bx bx-collection' ></i>
                  <span class="link_name" >Users</span>
                  </a>
                  <i class='bx bxs-chevron-down arrow' ></i>
               </div>
               <ul class="sub-menu">
                  @if(Auth::user()->role == 'admin' || Auth::user()->role == 'user' )
                  <li><a href="{{ route('users.create') }}">User Create</a></li>
                  <li><a href="{{ route('users.index') }}">User List</a></li>
               </ul>
            </li>
            <li>
               <div class="icon-link">
                  <a href="#">
                  <i class='bx bx-collection' ></i>
                  <span class="link_name">Roles</span>
                  </a>
                  <i class='bx bxs-chevron-down arrow' ></i>
               </div>
               <ul class="sub-menu">
                  <div id="admin">
                     <li><a class="link_name" href="#">Admin</a></li>
                     <li><a href="{{route('employees.create') }}">Employee Create</a></li>
                     <li><a href="{{ route('employees.index') }}">Employee View</a></li>
                  </div>
                  @elseif(Auth::user()->role == 'nonadmin')
               </ul>
               <li>
                  <div class="icon-link">
                  <a href="#">
                  <i class='bx bx-collection' ></i>
                  <span class="link_name">Roles</span>
                  </a>
                  <i class='bx bxs-chevron-down arrow' ></i>
               </div>
                <ul class="sub-menu">
                  <div id="nonadmin">
                     <li><a class="link_name" href="#">Non Admin</a></li>
                     <li><a href="{{ route('employees.index') }}">Employee View</a></li>
                  </li>
                  </div>
                  @endif
               </ul>
            </li>
            <div class="icon-link">
               <a href="#">
               <i class="fas fa-arrow-right-from-bracket"></i>
               <span class="link_name"> </span> 
               <a  href="{{ route('logout') }}">Logout</a>        
               </a>
            </div>
      </div>
      </ul>
      </div>
      <div id="main">
         <button class="closebtn" onclick="closeNav()">× </button>    
      </div>
   </body>
</html>
@endsection