<!DOCTYPE html>
<html lang="en">
  @include('include.head')
  <body>
    
    @include('include.navbar')
    <!-- END nav -->
    
    <div class="hero-wrap js-fullheight" style="background-image: url('user_assets/images/bg_2.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
          <div class="col-xl-10 ftco-animate mb-5 pb-5" data-scrollax=" properties: { translateY: '70%' }">
            <p class="mb-4 mt-5 pt-5" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">We have <span class="number" data-number="850000">0</span> great job offers you deserve!</p>
            <h1 class="mb-5" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Your Dream <br><span>Job is Waiting</span></h1>

            <div class="ftco-search">
              <div class="row">
                <div class="col-md-12 nav-link-wrap">
                  <div class="nav nav-pills text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active mr-md-1" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true">Find a Job</a>

                  </div>
                </div>
                <div class="col-md-12 tab-wrap">
                  
                  <div class="tab-content p-4" id="v-pills-tabContent">

                    <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-nextgen-tab">
                      <form action="{{url('/search-job')}}" method="get" class="search-job">
                        <div class="row">
                          <div class="col-md">
                            <div class="form-group">
                              <div class="form-field">
                                <div class="icon"><span class="icon-briefcase"></span></div>
                                 <select name="keyword" class="form-control" required>
                                <option selected disabled class="">Selected Nothing</option>
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
                                <input list="encodings" placeholder="Enter University Name" class="form-control custom-select custom-select-sm" required>
                                <datalist id="encodings">
                                  @foreach ($univ as $university)
                                    <option value="{{$university->university}}">{{$university->university}}</option>
                                  @endforeach
                                </datalist>
                              </div>
                            </div>
                          </div>
                          <div class="col-md">
                            <div class="form-group">
                              <div class="form-field">
                                <input type="submit" value="Submit" class="form-control btn btn-primary">
                              </div>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div><br><br>
              
            </div>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section bg-light">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <h2 class="mb-4"><span>Search</span> Results</h2>
          </div>
        </div>
        <table class="table table-borderd bg-light table-hover table-striped text-dark" style="background-color: #fff!important; padding: 20px!important;">
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
        

      </div>
    </section>
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
    
    @include('include.subscribe')

    @include('include.footer')
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

  @include('include.script')
  
  

  </body>
</html>