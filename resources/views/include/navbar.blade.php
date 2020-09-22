<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
@php
	$Block_Data2=\App\Model\HomePage::whereid('1')->get();

@endphp
@foreach($Block_Data2 as $block2)
      <a class="navbar-brand" href="{{ url('/') }}">{{ $block2->slide_logo }}</a>
@endforeach
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item @if(\Route::current()->getName() == '/') active @endif"><a href="{{route('/')}}" class="nav-link">Home</a></li>
          <li class="nav-item @if(\Route::current()->getName() == 'about') active @endif"><a href="{{route('about')}}" class="nav-link">About</a></li>
          <li class="nav-item @if(\Route::current()->getName() == 'blogs') active @endif"><a href="{{route('blogs')}}" class="nav-link">Blog</a></li>
          <li class="nav-item @if(\Route::current()->getName() == 'contact') active @endif"><a href="{{route('contact')}}" class="nav-link">Contact</a></li>
          <li class="nav-item cta mr-md-2"><a href="{{route('new-post')}}" class="nav-link">Post a Job</a></li>
          <li class="nav-item cta cta-colored"><a href="{{route('job-post')}}" class="nav-link">Want a Job</a></li>

        </ul>
      </div>
    </div>
  </nav>