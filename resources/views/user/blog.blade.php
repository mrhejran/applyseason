<!DOCTYPE html>
<html lang="en">
  @include('include.head')
  <body>
    
    @include('include.navbar')
    <!-- END nav -->
    
    <div class="hero-wrap js-fullheight" style="background-image: url('user_assets/images/bg_2.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start" data-scrollax-parent="true">
          <div class="col-md-8 ftco-animate text-center text-md-left mb-5" data-scrollax=" properties: { translateY: '70%' }">
          	<p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-3"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Blog</span></p>
            <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Blog</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section bg-light">
      <div class="container">
        <div class="row ">



<!-- @foreach($Block_Blog as $Blog)


			<div class="col-md-4">
				
						<img src="{{ asset('blog_images/'.$Blog->image_thumbnail) }}" style="height: 220px;width: 100%;border-radius: 10px;">
						<a href="#">{{ $Blog->DATE_BLOG }}</a>
						<a href="#">Admin</a>
						<h3><a href="{{ url('/ViewBlog/'.$Blog->B_URL) }}">{{ $Blog->title }}</a></h3>
						<p>{!! str_limit($Blog->post_body,140)  !!}
					
			</div>

@endforeach -->
@forelse($Block_Blog as $post)
            <div class='col-md-4'> 

				<!-- <a href="{{$post->url()}}"> -->
				<a href="{{$post->path()}}"><img src="{{ asset('blog_images/'.$post->image_thumbnail) }}" 
				style="height: 220px;width: 100%;border-radius: 10px;padding-bottom:20px"></a>
				<!-- </a> -->
        <span class=''>{{date('d-M-Y', strtotime($post->posted_at))}} </span>
        <span style="padding-right:10px;float:right">{{ $post->author->name}}</span><hr>
                <h3 class=''><a href="{{$post->path()}}">{{$post->title}}</a></h3>
				
                <p>{!! $post->generate_introduction(140) !!}</p>
                <!-- <a href="{{$post->url()}}" class="btn btn-info">View Post</a> -->
            </div>
            @empty
            no post
        @endforelse

		<div class="block-27">
			{{ $Block_Blog->links() }}
		</div>

        </div>
      </div>
    </section>
		
	 @include('include.subscribe')

    @include('include.footer')
<style>
	.block-27 ul li a, .block-27 ul li span {
		display: inline-block;
		width: 40px;
		height: 40px;
		line-height: 25px;
	}
</style>
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  @include('include.script')
    
  </body>
</html>
