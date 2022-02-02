<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        @livewireStyles

        <!-- Scripts -->
        
    </head>
<!-- This example requires Tailwind CSS v2.0+ -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">Test Project</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav my-2 my-lg-0 ml-auto">
          @auth
          <li class="nav-link">Welcome {{ auth()->user()->name }} |</li>
          @endauth
          <li class="nav-item active">
            @if(Route::has('login'))
              @auth
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <div class="nav-item">
                  <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                              this.closest('form').submit(); " role="button">
                      <i class="fas fa-sign-out-alt"></i>
      
                      {{ __('Log Out') }}
                  </a>
                </div>
            </form>
              @else
              <a class="nav-link badge badge-default" href="/login">Login</a>
              <a class="nav-link badge badge-default" href="/register">Register</a>
              @endauth
            @endif
          </li>
        </ul>
      </div>
    </nav>

    <div class="container">
      {{ $slot }}
    </div>
