@extends('layouts.user')


@section('header')

@php
	$Block_Data1=\App\Model\HomePage::whereid('1')->get();

@endphp
@foreach($Block_Data1 as $block1)
<div class="hero-wrap js-fullheight" style="background-image: url('{{ asset('/page_content/'.$block1->slide_imge) }}');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
          <div class="col-xl-10 ftco-animate mb-5 pb-5" data-scrollax=" properties: { translateY: '70%' }">
            <p class="mb-4 mt-5 pt-5" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">We have <span class="number" data-number="850000">0</span> great job offers you deserve!</p>
            <h1 class="mb-5" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">{{ $block1->slide_title }}</h1>
@endforeach

          <div style="display:none;">
            <a href="https://www.worldflagcounter.com/details/hfR"><img src="https://www.worldflagcounter.com/hfR/" alt="Flag Counter">
            </a>
          </div>
        <div class="ftco-search">
              <div class="row">
                <div class="col-md-12 nav-link-wrap">
                  <div class="nav nav-pills text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active mr-md-1" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true">Find a Proffessor</a>
                  </div>
                </div>
                <div class="col-md-12 tab-wrap">
                  <div class="tab-content p-4" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-nextgen-tab">
                      <form action="{{url('/')}}" method="POST" class="search-job">
                        @csrf
                        <div class="row">
                          <div class="col-md">
                            <div class="form-group">
                              <div class="form-field">
                                <div class="icon"><span class="icon-briefcase"></span></div>
                                  <select class="selectpicker" id="field" name="keyword" multiple data-live-search="true">
                                    @foreach ($desc as $descipline)
                                      <option value="{{$descipline->disciplines}}">{{$descipline->disciplines}}</option>
                                    @endforeach
                                  </select>
                              </div>
                            </div>
                          </div>
                          <div class="col-md">
                            <div class="form-group">
                              <div class="form-field">
                                <div class="icon"><span class="icon-map-marker"></span></div>
                                
                                <select class="selectpicker" id="inst" multiple data-live-search="true">
                                    @foreach ($univ as $university)
                                      <option value="{{$university->university}}">{{str_replace('_x000D_','',$university->university)}}</option>
                                    @endforeach
                                  </select>
                              </div>
                            </div>
                          </div>
                          <div class="col-md">
                            <div class="form-group">
                              <div class="form-field">
                                <input type="submit" id="submitRes" value="Search" class="form-control btn btn-primary">
                              </div>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  $('select').selectpicker();
</script>

@endsection

@section('main_content')
    @if($data != "")
    <section class="ftco-section container">
          <table class="table table-borderd bg-light table-hover table-striped text-dark table-sm" style="background-color: #fff!important; padding: 20px!important;">
            <thead>
              <tr>
                <th>University</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Research Interest</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($data as $user)
                <tr>
                  <td>{{str_replace('_x000D_','',$user->university)}}</td>
                  <td>{{$user->name}}</td>
                  <td>{{$user->email}}</td>
                  <td>{{$user->phone}}</td>
                  <td>{{$user->research_interests}}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
            @if (!session()->has('email'))
              <div class="text-center">
                <a class="btn btn-primary" id="seeMore" value="awais" data-toggle="modal" data-target="#exampleModal">See More</a>
              </div>
            @else
              <div class="text-center">
                <a class="btn btn-primary" href="/user__panel">See More</a>
              </div>
            @endif
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              {{-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> --}}
              <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Login</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Register</a>
                </li>
              </ul>
              
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                  <form  action="{{ route('user.login') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input id="email" class="form-control" type="email" required name="email" placeholder="Enter Email Here">
                    </div>
                    <div class="form-group">
                      <label for="Pass">Password</label>
                      <input id="Pass" class="form-control" type="password" required name="password" placeholder="Enter Password Here">
                    </div>
                    <div class="form-group text-center">
                      <input type="submit" class="btn btn-info" value="Login" name="login">
                    </div>
                  </form>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                  <form action="{{route('user.register')}}" method="POST">
                    @csrf
                    <div class="form-group">
                      <label for="name">Name</label>
                      <input id="name" class="form-control" type="text" required name="name" placeholder="Enter Name Here">
                    </div>
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input id="email" class="form-control" type="email" required name="email" placeholder="Enter Email Here">
                    </div>
                    <div class="form-group">
                      <label for="Pass">Password</label>
                      <input id="Pass" class="form-control" type="password" required name="password" placeholder="Enter Password Here">
                    </div>
                    <div class="form-group text-center">
                      <button type="submit" class="btn btn-info">Register</button>
                    </div>
                  </form>
                </div>
                
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
        </section>

        @endif
    <section class="ftco-section services-section bg-light">
          <div class="container">
            <div class="row d-flex">
              <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services d-block">
                  <div class="icon"><span class="flaticon-resume"></span></div>
                  <div class="media-body">
                    <h3 class="heading mb-3">Search Millions of Jobs</h3>
                    <p>A small river named Duden flows by their place and supplies.</p>
                  </div>
                </div>      
              </div>
              <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services d-block">
                  <div class="icon"><span class="flaticon-collaboration"></span></div>
                  <div class="media-body">
                    <h3 class="heading mb-3">Easy To Manage Jobs</h3>
                    <p>A small river named Duden flows by their place and supplies.</p>
                  </div>
                </div>    
              </div>
              <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services d-block">
                  <div class="icon"><span class="flaticon-promotions"></span></div>
                  <div class="media-body">
                    <h3 class="heading mb-3">Top Careers</h3>
                    <p>A small river named Duden flows by their place and supplies.</p>
                  </div>
                </div>      
              </div>
              <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services d-block">
                  <div class="icon"><span class="flaticon-employee"></span></div>
                  <div class="media-body">
                    <h3 class="heading mb-3">Search Expert Candidates</h3>
                    <p>A small river named Duden flows by their place and supplies.</p>
                  </div>
                </div>      
              </div>
            </div>
          </div>
    </section>
    <section class="ftco-section ftco-counter">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <span class="subheading">Categories work wating for you</span>
            <h2 class="mb-4"><span>Current</span> Job Posts</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3 ftco-animate">
            <ul class="category">
              <li><a href="#">Web Development <span class="number" data-number="1000">0</span></a></li>
              <li><a href="#">Graphic Designer <span class="number" data-number="1000">0</span></a></li>
              <li><a href="#">Multimedia <span class="number" data-number="2000">0</span></a></li>
              <li><a href="#">Advertising <span class="number" data-number="900">0</span></a></li>
            </ul>
          </div>
          <div class="col-md-3 ftco-animate">
            <ul class="category">
              <li><a href="#">Education &amp; Training <span class="number" data-number="3500">0</span></a></li>
              <li><a href="#">English <span class="number" data-number="1560">0</span></a></li>
              <li><a href="#">Social Media <span class="number" data-number="1000">0</span></a></li>
              <li><a href="#">Writing <span class="number" data-number="2500">0</span></a></li>
            </ul>
          </div>
          <div class="col-md-3 ftco-animate">
            <ul class="category">
              <li><a href="#">PHP Programming <span class="number" data-number="5500">0</span></a></li>
              <li><a href="#">Project Management <span class="number" data-number="2000">0</span></a></li>
              <li><a href="#">Finance Management <span class="number" data-number="800">0</span></a></li>
              <li><a href="#">Office &amp; Admin <span class="number" data-number="7000">0</span></a></li>
            </ul>
          </div>
          <div class="col-md-3 ftco-animate">
            <ul class="category">
              <li><a href="#">Web Designer <span><span class="number" data-number="8000">0</span></span></a></li>
              <li><a href="#">Customer Service <span class="number" data-number="4000">0</span></a></li>
              <li><a href="#">Marketing &amp; Sales <span class="number" data-number="3300">0</span></a></li>
              <li><a href="#">Software Development <span class="number" data-number="1356">0</span></a></li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <section class="ftco-section bg-light">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <span class="subheading">Recently Added Jobs</span>
            <h2 class="mb-4"><span>Recent</span> Jobs</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 ftco-animate">

            <div class="job-post-item bg-white p-4 d-block d-md-flex align-items-center">

              <div class="mb-4 mb-md-0 mr-5">
                <div class="job-post-item-header d-flex align-items-center">
                  <h2 class="mr-3 text-black h3">Frontend Development</h2>
                  <div class="badge-wrap">
                   <span class="bg-primary text-white badge py-2 px-3">Partime</span>
                  </div>
                </div>
                <div class="job-post-item-body d-block d-md-flex">
                  <div class="mr-3"><span class="icon-layers"></span> <a href="#">Facebook, Inc.</a></div>
                  <div><span class="icon-my_location"></span> <span>Western City, UK</span></div>
                </div>
              </div>

              <div class="ml-auto d-flex">
                <a href="job-single.html" class="btn btn-primary py-2 mr-1">Apply Job</a>
                <a href="#" class="btn btn-secondary rounded-circle btn-favorite d-flex align-items-center icon">
                  <span class="icon-heart"></span>
                </a>
              </div>
            </div>
          </div><!-- end -->

          <div class="col-md-12 ftco-animate">
            <div class="job-post-item bg-white p-4 d-block d-md-flex align-items-center">

              <div class="mb-4 mb-md-0 mr-5">
               <div class="job-post-item-header d-flex align-items-center">
                 <h2 class="mr-3 text-black h4">Full Stack Developer</h2>
                 <div class="badge-wrap">
                  <span class="bg-warning text-white badge py-2 px-3">Full Time</span>
                 </div>
               </div>
               <div class="job-post-item-body d-block d-md-flex">
                 <div class="mr-3"><span class="icon-layers"></span> <a href="#">Google, Inc.</a></div>
                 <div><span class="icon-my_location"></span> <span>Western City, UK</span></div>
               </div>
              </div>

              <div class="ml-auto d-flex">
                <a href="job-single.html" class="btn btn-primary py-2 mr-1">Apply Job</a>
                <a href="#" class="btn btn-danger rounded-circle btn-favorite d-flex align-items-center">
                  <span class="icon-heart"></span>
                </a>
              </div>

            </div>
          </div> <!-- end -->
          <div class="col-md-12 ftco-animate">
           <div class="job-post-item bg-white p-4 d-block d-md-flex align-items-center">

              <div class="mb-4 mb-md-0 mr-5">
               <div class="job-post-item-header d-flex align-items-center">
                 <h2 class="mr-3 text-black h4">Open Source Interactive Developer</h2>
                 <div class="badge-wrap">
                  <span class="bg-info text-white badge py-2 px-3">Freelance</span>
                 </div>
               </div>
               <div class="job-post-item-body d-block d-md-flex">
                 <div class="mr-3"><span class="icon-layers"></span> <a href="#">New York Times</a></div>
                 <div><span class="icon-my_location"></span> <span>Western City, UK</span></div>
               </div>
              </div>
              
              <div class="ml-auto d-flex">
                <a href="job-single.html" class="btn btn-primary py-2 mr-1">Apply Job</a>
                <a href="#" class="btn btn-secondary rounded-circle btn-favorite d-flex align-items-center icon">
                  <span class="icon-heart"></span>
                </a>
              </div>
           </div>
         </div> <!-- end -->
         <div class="col-md-12 ftco-animate">

           <div class="job-post-item bg-white p-4 d-block d-md-flex align-items-center">

              <div class="mb-4 mb-md-0 mr-5">
               <div class="job-post-item-header d-flex align-items-center">
                 <h2 class="mr-3 text-black h4">Frontend Development</h2>
                 <div class="badge-wrap">
                  <span class="bg-secondary text-white badge py-2 px-3">Internship</span>
                 </div>
               </div>
               <div class="job-post-item-body d-block d-md-flex">
                 <div class="mr-3"><span class="icon-layers"></span> <a href="#">Facebook, Inc.</a></div>
                 <div><span class="icon-my_location"></span> <span>Western City, UK</span></div>
               </div>
              </div>

              <div class="ml-auto d-flex">
                <a href="job-single.html" class="btn btn-primary py-2 mr-1">Apply Job</a>
                <a href="#" class="btn btn-secondary rounded-circle btn-favorite d-flex align-items-center icon">
                  <span class="icon-heart"></span>
                </a>
              </div>
           </div>
         </div> <!-- end -->
         <div class="col-md-12 ftco-animate">
           <div class="job-post-item bg-white p-4 d-block d-md-flex align-items-center">

              <div class="mb-4 mb-md-0 mr-5">
               <div class="job-post-item-header d-flex align-items-center">
                 <h2 class="mr-3 text-black h4">Open Source Interactive Developer</h2>
                 <div class="badge-wrap">
                  <span class="bg-danger text-white badge py-2 px-3">Temporary</span>
                 </div>
               </div>
               <div class="job-post-item-body d-block d-md-flex">
                 <div class="mr-3"><span class="icon-layers"></span> <a href="#">New York Times</a></div>
                 <div><span class="icon-my_location"></span> <span>Western City, UK</span></div>
               </div>
              </div>
              
              <div class="ml-auto d-flex">
                <a href="job-single.html" class="btn btn-primary py-2 mr-1">Apply Job</a>
                <a href="#" class="btn btn-secondary rounded-circle btn-favorite d-flex align-items-center icon">
                  <span class="icon-heart"></span>
                </a>
              </div>
           </div>
         </div> <!-- end -->
         <div class="col-md-12 ftco-animate">

            <div class="job-post-item bg-white p-4 d-block d-md-flex align-items-center">

              <div class="mb-4 mb-md-0 mr-5">
                <div class="job-post-item-header d-flex align-items-center">
                  <h2 class="mr-3 text-black h3">Frontend Development</h2>
                  <div class="badge-wrap">
                   <span class="bg-primary text-white badge py-2 px-3">Partime</span>
                  </div>
                </div>
                <div class="job-post-item-body d-block d-md-flex">
                  <div class="mr-3"><span class="icon-layers"></span> <a href="#">Facebook, Inc.</a></div>
                  <div><span class="icon-map-marker"></span> <span>Western City, UK</span></div>
                </div>
              </div>

              <div class="ml-auto d-flex">
                <a href="job-single.html" class="btn btn-primary py-2 mr-1">Apply Job</a>
                <a href="#" class="btn btn-secondary rounded-circle btn-favorite d-flex align-items-center icon">
                  <span class="icon-heart"></span>
                </a>
              </div>
            </div>
          </div><!-- end -->

          <div class="col-md-12 ftco-animate">
            <div class="job-post-item bg-white p-4 d-block d-md-flex align-items-center">

              <div class="mb-4 mb-md-0 mr-5">
               <div class="job-post-item-header d-flex align-items-center">
                 <h2 class="mr-3 text-black h4">Full Stack Developer</h2>
                 <div class="badge-wrap">
                  <span class="bg-warning text-white badge py-2 px-3">Full Time</span>
                 </div>
               </div>
               <div class="job-post-item-body d-block d-md-flex">
                 <div class="mr-3"><span class="icon-layers"></span> <a href="#">Google, Inc.</a></div>
                 <div><span class="icon-my_location"></span> <span>Western City, UK</span></div>
               </div>
              </div>

              <div class="ml-auto d-flex">
                <a href="job-single.html" class="btn btn-primary py-2 mr-1">Apply Job</a>
                <a href="#" class="btn btn-secondary rounded-circle btn-favorite d-flex align-items-center icon">
                  <span class="icon-heart"></span>
                </a>
              </div>

            </div>
          </div> <!-- end -->
          <div class="col-md-12 ftco-animate">
           <div class="job-post-item bg-white p-4 d-block d-md-flex align-items-center">

              <div class="mb-4 mb-md-0 mr-5">
               <div class="job-post-item-header d-flex align-items-center">
                 <h2 class="mr-3 text-black h4">Open Source Interactive Developer</h2>
                 <div class="badge-wrap">
                  <span class="bg-info text-white badge py-2 px-3">Freelance</span>
                 </div>
               </div>
               <div class="job-post-item-body d-block d-md-flex">
                 <div class="mr-3"><span class="icon-layers"></span> <a href="#">New York Times</a></div>
                 <div><span class="icon-my_location"></span> <span>Western City, UK</span></div>
               </div>
              </div>
              
              <div class="ml-auto d-flex">
                <a href="job-single.html" class="btn btn-primary py-2 mr-1">Apply Job</a>
                <a href="#" class="btn btn-secondary rounded-circle btn-favorite d-flex align-items-center icon">
                  <span class="icon-heart"></span>
                </a>
              </div>
           </div>
         </div> <!-- end -->
         <div class="col-md-12 ftco-animate">

           <div class="job-post-item bg-white p-4 d-block d-md-flex align-items-center">

              <div class="mb-4 mb-md-0 mr-5">
               <div class="job-post-item-header d-flex align-items-center">
                 <h2 class="mr-3 text-black h4">Frontend Development</h2>
                 <div class="badge-wrap">
                  <span class="bg-secondary text-white badge py-2 px-3">Internship</span>
                 </div>
               </div>
               <div class="job-post-item-body d-block d-md-flex">
                 <div class="mr-3"><span class="icon-layers"></span> <a href="#">Facebook, Inc.</a></div>
                 <div><span class="icon-my_location"></span> <span>Western City, UK</span></div>
               </div>
              </div>

              <div class="ml-auto d-flex">
                <a href="job-single.html" class="btn btn-primary py-2 mr-1">Apply Job</a>
                <a href="#" class="btn btn-secondary rounded-circle btn-favorite d-flex align-items-center icon">
                  <span class="icon-heart"></span>
                </a>
              </div>
           </div>
         </div> <!-- end -->
         <div class="col-md-12 ftco-animate">
           <div class="job-post-item bg-white p-4 d-block d-md-flex align-items-center">

              <div class="mb-4 mb-md-0 mr-5">
               <div class="job-post-item-header d-flex align-items-center">
                 <h2 class="mr-3 text-black h4">Open Source Interactive Developer</h2>
                 <div class="badge-wrap">
                  <span class="bg-danger text-white badge py-2 px-3">Temporary</span>
                 </div>
               </div>
               <div class="job-post-item-body d-block d-md-flex">
                 <div class="mr-3"><span class="icon-layers"></span> <a href="#">New York Times</a></div>
                 <div><span class="icon-my_location"></span> <span>Western City, UK</span></div>
               </div>
              </div>
              
              <div class="ml-auto d-flex">
                <a href="job-single.html" class="btn btn-primary py-2 mr-1">Apply Job</a>
                <a href="#" class="btn btn-secondary rounded-circle btn-favorite d-flex align-items-center icon">
                  <span class="icon-heart"></span>
                </a>
              </div>
           </div>
         </div> <!-- end -->
        </div>
        <div class="row mt-5">
          <div class="col text-center">
            <div class="block-27">
              <ul>
                <li><a href="#">&lt;</a></li>
                <li class="active"><span>1</span></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">&gt;</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="ftco-section ftco-counter img" id="section-counter" style="background-image: url(images/bg_1.jpg);" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-10">
              @php
                $Block_Counter=\App\Model\Counter::whereid('1')->get();
              @endphp
              @foreach($Block_Counter as $Counter)
                <div class="row">
                <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                  <div class="block-18 text-center">
                    <div class="text">
                      <strong class="number" data-number="{{ $Counter->cout_Jobs }}">0</strong>
                      <span>Jobs</span>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                  <div class="block-18 text-center">
                    <div class="text">
                      <strong class="number" data-number="{{ $Counter->cout_Members }}">0</strong>
                      <span>Members</span>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                  <div class="block-18 text-center">
                    <div class="text">
                      <strong class="number" data-number="{{ $Counter->cout_Resume }}">0</strong>
                      <span>Resume</span>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                  <div class="block-18 text-center">
                    <div class="text">
                      <strong class="number" data-number="{{ $Counter->cout_Company }}">0</strong>
                      <span>Company</span>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </section>
    <section class="ftco-section testimony-section">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 text-center heading-section ftco-animate">
            <span class="subheading">Testimonial</span>
            <h2 class="mb-4"><span>Happy</span> Clients</h2>
          </div>
        </div>
        <div class="row ftco-animate">
          <div class="col-md-12">
            <div class="carousel-testimony owl-carousel ftco-owl">
              @php
                $Block_Client=\App\Model\HappyClients::orderBy('ID','DESC')->get();

              @endphp
              <?php
              $count = 1;
              foreach($Block_Client as $Client):
              ?>
                <div class="item">
                  <div class="testimony-wrap py-4 pb-5">
                    <div class="user-img mb-4" style="background-image: url('{{ asset('/clientImages/'.$Client->image) }}')">
                      <span class="quote d-flex align-items-center justify-content-center">
                        <i class="icon-quote-left"></i>
                      </span>
                    </div>
                    <div class="text">
                      <p class="mb-4">@php echo $Client->description @endphp</p>
                      <p class="name">{{$Client->name}}</p>
                      <span class="position">{{$Client->type}}</span>
                    </div>
                  </div>
                </div>
              <?php
              $count++;
              endforeach;
              ?>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="ftco-section bg-light">
        <div class="container">
          <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section text-center ftco-animate">
              <span class="subheading">Our Blog</span>
              <h2><span>Recent</span> Blog</h2>
            </div>
          </div>
          <div class="row d-flex">
            @forelse($Block_Blog as $post)
              <div class="col-md-3 d-flex ftco-animate">
                <div class="blog-entry align-self-stretch">
                  <a href="#" class="block-20" style="background-image: url('{{ asset('blog_images/'.$post->image_thumbnail) }}');">
                  </a>
                  <div class="text mt-3">
                    <div class="meta mb-2">
                      <div><a href="#">{{date('d-M-Y', strtotime($post->posted_at))}}</a></div>
                      <div><a href="#">{{ $post->author->name}}</a></div>
                      <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                    </div>
                    <h3 class="heading"><a href="#">{{$post->title}}</a></h3>
                   <p>{!! $post->generate_introduction(140) !!}</p>
                  </div>
                </div>
              </div>
              @empty
                no post
            @endforelse
          </div>
        </div>
    </section>
    <script>
        
        // $("#submitRes").click(function(){
        //   var field = $("#field").val();
        //   var inst = $("#inst").val();
        //   $.ajax({
        //     type: "POST",
        //     url: '/showTableData',
        //     data: {inst:inst, field:field},
        //     beforeSend: function(){

        //     },
        //     complete: function(){

        //     },
        //     success: function(res){
        //       console.log(res);
        //     }

        //   });
        // });


    </script>
@endsection
