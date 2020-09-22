<!DOCTYPE html>
<html lang="en">

<style>

      /* Position the Popup form */
      .login-popup {
      	position: relative;

      	width: 100%;
      }
      /* Hide the Popup form */
      .form-popup {
      	display: none;
      	position: fixed;

      	left: 45%;
      	top:40%;
      	transform: translate(-45%,5%);
      	/*border: 2px solid #666;*/
      	z-index: 9;
      }
      /* Styles for the form container */
      .form-container {
      	max-width: 400px;
      	padding: 20px;
      	background:white;
        border:1px solid #F0F0F0;
      }
      /* Full-width for input fields */
      .form-container input[type=text], .form-container input[type=password] {
      	width: 100%;
      	padding: 3px 7px;
      	margin: 3px 0 7px 0;
      	border: none;
      	background: #eee;
      }
      /* When the inputs get focus, do something */
      .form-container input[type=text]:focus, .form-container input[type=password]:focus {
      	background-color: #ddd;
      	outline: none;
      }
      /* Style submit/login button */
      .form-container .btn {
      	background-color: #F0F0F0;
      	color: black;
      	padding: 10px 2px;
      	border: none;
      	cursor: pointer;
      	width: 21%;
        float:left;
      	margin-bottom:6px;
      	opacity: 0.8;
      }
      /* Style cancel button */
      .form-container .cancel {
      	/* background-color: #F0F0F0; */
      }
      /* Hover effects for buttons */
      .form-container .btn:hover, .open-button:hover {
      	opacity: 1;
      }
      .collapsible {
      	background:white;
      	color: black;
      	cursor: pointer;
      	padding: 5px 20px;
      	width: 100%;
      	border: none;
      	text-align: left;
      	outline: none;
      	font-size: 15px;
      }

      .active, .collapsible:hover {
      	background-color: white;
      	color:black;
      }

      .content {
      	padding: 0 18px;
      	display: none;
      	overflow: hidden;
      	background-color: #f1f1f1;
      }
      a {
      	color: #365899;
      }

      .post-header {
      	background: transparent;
      	border-bottom: 0;
      }

      .post-header h6 {
      	font-size: .9rem;
      	font-weight: 700;
      	margin-bottom: 0;
      }

      .post-text {
      	font-size: .875rem;
      }

      .avatar {
      	width: 36px;
      	border: 1px solid rgba(0, 0, 0, .15);
      }

      .post-actions {
      	background: transparent;
      	border-top: 0;
      }

      .header {
      	display: block;
      	width: 100%;
      	height: 48px;
      	background-color: #4267b2;
      	color: #fff;
      }

      .header > span {
      	display: block;
      	padding: 12px 15px;
      }

      .d-grid {
      	display: grid;
      	grid-template-columns: repeat(4, 1fr);
      	grid-auto-rows: 100px;
      	grid-gap: 5px;
      }

      .item {
      	position: relative;
      }

      .item:nth-child(2) {
      	grid-column: 3;
      	grid-row: 2 / 4;
      }

      .item:nth-child(5) {
      	grid-column: 1 / 3;
      	grid-row: 1 / 3;
      }

      .item a {
      	position: absolute;
      	left: 0;
      	right: 0;
      	bottom: 0;
      	top: 0;
      	overflow: hidden;
      }

      .item img {
      	height: 100%;
      	width: auto;
      }

      .special-form-control {
      	padding-left: 0;
      	font-size: .785rem;
      }

      .actions-menu {
      	flex-wrap: nowrap;
      	display: flex;
      }

      .btn-floating {
      	background: #eee;
      }

      .btn-floating:not(:hover) {
      	box-shadow: none !important;
      }

      .btn-floating i {
      	color: #1d2129;
      }
      
      .demo-download{
          float:left;
          margin-right:20px;
  
        }
       
      
    </style>
  @include('include.head')
 
  <body >
    
    @include('include.navbar')
    <!-- END nav -->
    
    <div class="hero-wrap js-fullheight" style="background-image: url('{{ asset('user_assets/images/bg_2.jpg') }}');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start" data-scrollax-parent="true">
          <div class="col-md-8 ftco-animate text-center text-md-left mb-5" data-scrollax=" properties: { translateY: '70%' }">
          	<p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-3"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span class="mr-3"><a href="blog.html">Blog <i class="ion-ios-arrow-forward"></i></a></span> <span>Single</span></p>
            <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Blog Single</h1>
          </div>
        </div>
      </div>
    </div>

  
    <section class="ftco-section ftco-degree-bg">
      <div class="container">
        <div class="row">
          <div class="col-md-8 ftco-animate">
            <h2 class="mb-3">{{ $blog_data->title}}</h2>
          
            <p>
              <!-- <img src="{{asset('user_assets/images/image_7.jpg')}}" alt="" class="img-fluid"> -->
              <img src="{{ asset('blog_images/'.$blog_data->image_large) }}" alt="post_image" class="img-fluid">
            </p>
            <p>{!! $blog_data->post_body !!}</p>
              
            <div class="tag-widget post-tag-container mb-5 mt-5">
              <div class="tagcloud">
              @foreach($blog_data->categories as $value)
                <a href="#" class="tag-cloud-link">{{$value->category_name}}</a>

                @endforeach
              </div>
            </div>
            <hr>
            <!-- <div class="about-author d-flex p-4 bg-light">
              <div class="bio mr-5">
                <img src="{{asset('user_assets/images/person_1.jpg')}}" alt="Image placeholder" class="img-fluid mb-4">
              </div>
              <div class="desc">
                <h3>George Washington</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p>
              </div>
            </div> -->


            <div class="pt-5 mt-5">
              <h3 class="mb-5"> Comments({{ count($blog_data->comments)}})</h3>
              <ul class="comment-list">
              @forelse($blog_data->comments as $key=>$value)
                <li class="comment">
                  <div class="vcard bio">
                    <img src="{{asset('user_assets/images/avatar-1577909_640.png')}}" alt="Image placeholder">
                  </div>
                  <div class="comment-body">
                    <h3>
                      @if (!\Auth::check()) 
						{{ $value->author_name}}
					@else 
						{{ $value->user->name}}
					@endif
                   </h3>
                    <div class="meta">{{date('d-M-Y', strtotime($value->created_at))}} at {{$value->created_at->diffForHumans()}}</div>
                    <p>{{ $value->comment }}</p>
                    <!-- <p class="btn btn-default reply" id="reply">Reply</p> -->
                    <input type="button" style="padding:3px 10px;font-size:13px" value="Reply" class="demo-download open-button btn btn-default"   onclick="openForm()">
    
                    
                  </div>
                
                </li>
                
                @empty
                <li class="alert alert-danger text-center"><h4>No comments available in this Post.</h4></li>
              @endforelse
              </ul>
              
              <!-- END comment-list -->
              
              <div class="comment-form-wrap pt-5">
                <h3 class="mb-5">Leave a comment</h3>
                @guest 
                    <p>For post a comment. You need to login first. 
                    <a href="{{ Route('login') }}">Login</a>
                    </p>
                @else
                <form action="{{ route('comment.store',$blog_data->id)}}" method="post" class="p-5 bg-light">
                  @csrf
                  <div class="form-group">
                    <label for="name">Name *</label>
                    <input type="text" class="form-control" name="author_name" id="name" required>
					@if ($errors->has('author_name'))
								<p class="invalid-feedback text-danger" role="alert">
									{{ $errors->first('author_name') }}
								</p>
							@endif
                  </div>
                  <div class="form-group">
                    <label for="email">Email *</label>
                    <input type="email" class="form-control" name="author_email" id="email" required>
					@if ($errors->has('author_email'))
								<p class="invalid-feedback text-danger" role="alert">
									{{ $errors->first('author_email') }}
								</p>
							@endif
                  </div>
                  <div class="form-group">
                    <label for="website">Website</label>
                    <input type="text" name="author_website" class="form-control" id="website">
                  </div>

                  <div class="form-group">
                    <label for="comment">Message</label>
                    <textarea name="comment" id="comment" cols="30" rows="5" class="form-control"></textarea>
                  </div>
                  <div class="form-group">
                    <input type="submit" value="Post Comment" class="btn py-3 px-4 btn-primary">
                  </div>

                </form>
                @endguest
              </div>
            </div>

          </div> <!-- .col-md-8 -->
          <div class="col-md-4 sidebar ftco-animate">
            <div class="sidebar-box">
              <form action="#" class="search-form">
                <div class="form-group">
                  <span class="icon icon-search"></span>
                  <input type="text" class="form-control" placeholder="Type a keyword and hit enter">
                </div>
              </form>
            </div>
            <div class="sidebar-box ftco-animate">
              <div class="categories">
                <h3>Categories</h3>
                @foreach($category as $value)
                <li><a href="#">{{ $value->category_name}} <span>({{ count($value->posts) }})</span></a></li>
  
                @endforeach
                
              </div>
            </div>

            <div class="sidebar-box ftco-animate">
              <h3>Recent Blog</h3>
              @foreach($recent_post as $value)
              <div class="block-21 mb-4 d-flex">
              <a href="#" class="blog-img mr-4"><img style="width:100px;height:90px" src="{{ asset('blog_images/'.$value->image_thumbnail) }}" alt=""></a>
                <!-- <a class="blog-img mr-4" style="background-image: url('{{ asset('user_assets/images/bg_2.jpg') }}');"></a> -->
                <div class="text">
                  <h3 class="heading"><a href="#">{{ str_limit($value->title,100) }}</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span> {{date('d-M-Y', strtotime($value->posted_at))}}</a></div>
                    <div><a href="#"><span class="icon-person"></span> {{ $value->author->name}}</a></div>
                    <!-- <div><a href="#"><span class="icon-chat"></span> 19</a></div> -->
                  </div>
                </div>
              </div>
              @endforeach
            </div>

            <div class="sidebar-box ftco-animate">
              <h3>Tag Cloud</h3>
              <div class="tagcloud">
              @foreach($seo_title as $value)
                <a href="#" class="tag-cloud-link">{{$value->seo_title}}</a>
                @endforeach
              </div>
            </div>

            <div class="sidebar-box ftco-animate">
              <h3>Paragraph</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p>
            </div>
          </div>

        </div>
      </div>
    </section> <!-- .section -->

    <div class="col-md-6 mx-md-auto">
      <div class="open-btn" >

                  <div class="login-popup">
                  <div class="form-popup" id="popupForm">
                    <form action="{{ route('comment.store',$blog_data->id)}}" method="post" class="form-container">
                    @csrf
                    <h5 style="color:grey;font-size:13px;text-transform:uppercase">Reply Message
                      <button type="button" class="fa fa-close" style="cursor:pointer;color:#F0F0F0;background:white;float:right;border:0" onclick="closeForm()"></button></h5>
                      <textarea style="padding:0 6px;margin: 5px 0 12px 0;border: 1px solid #F0F0F0" name="comment" cols="30" rows="3"  ></textarea>
                      <button type="submit" class="btn btn-default" style="padding:5px 3px;font-size:13px">Reply</button><br><br>

                    </form>
                  </div>
                </div><br>
              </div>

            </div>
    </div>
		@include('include.subscribe')

    @include('include.footer')
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>
<script>
  function openForm() {
   document.getElementById("popupForm").style.display="block";
 }

 function closeForm() {
   document.getElementById("popupForm").style.display="none";
  
 }
</script>

  @include('include.script')

  </body>
</html>
