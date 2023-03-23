@extends('layouts.app')
@section('content')
<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-8">
         <div class="card">
            <div class="card-header">{{ __('Login') }}</div>
            @error('failed')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
               <p>{{ $message }}</p>
            </div>
            @endif
            @if ($message = Session::get('fail'))
            <div class="alert alert-success">
               <p>{{ $message }}</p>
            </div>
            @endif
            <div class="card-body">
               <form method="POST" action="{{ route('login') }}">
                  @csrf
                  <div class="row mb-3">
                     <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
                     <div class="col-md-6">
                        <input id="email" type="email" class="form-control"  name="email" value="{{ old('email') }}" >
                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                     </div>
                  </div>
                  <div class="row mb-3">
                     <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
                     <div class="col-md-6">
                        <input id="password" type="password" class="form-control" name="password"  >
                        @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                     </div>
                  </div>
                  <div class="row mb-3">
                     <div class="col-md-6 offset-md-4">
                        <div class="form-check">
                           <input class="form-check-input" type="checkbox" name="remember" id="remember" value="{{ old('remember') ? 'checked' : '' }}" >
                           <label class="form-check-label" for="remember">
                           {{ __('Remember Me') }}
                           </label>
                        </div>
                     </div>
                  </div>
                  <div class="row mb-0">
                     <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                        {{ __('Login') }}
                        </button>
                        @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                        </a>
                        @endif
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection