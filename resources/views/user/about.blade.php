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
          	<p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-3"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>About</span></p>
            <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">About</h1>
          </div>
        </div>
      </div>
    </div>

@php
	$Block_Data=\App\Model\Page_Content::whereid('1')->get();

@endphp
@foreach($Block_Data as $block)
    <section class="ftco-about d-md-flex">
    	<div class="one-half img" style="background-image: url('{{ asset('public/page_content/'.$block->section_img) }}');"></div>
    	<div class="one-half ftco-animate">
        <div class="heading-section ftco-animate ">
          <h2 class="mb-4"><span>{{ $block->section_title }}</span></h2>
        </div>
        <div>
  				<p>
					@php echo $block->section_description @endphp
				</p>
  			</div>
    	</div>
    </section>
@endforeach
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
                  <div class="user-img mb-4" style="background-image: url('{{ asset('public/clientImages/'.$Client->image) }}')">
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

    <section class="ftco-section ftco-counter img" id="section-counter" style="background-image: url(user_assets/images/bg_1.jpg);" data-stellar-background-ratio="0.5">
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
		
		@include('include.subscribe')

    @include('include.footer')
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  @include('include.script')
    
  </body>
</html>
