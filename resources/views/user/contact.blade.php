<!DOCTYPE html>
<html lang="en">
  @include('include.head')
  <script  src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <body>
    
    @include('include.navbar')
    <!-- END nav -->
    
    <div class="hero-wrap js-fullheight" style="background-image: url('user_assets/images/bg_2.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start" data-scrollax-parent="true">
          <div class="col-md-8 ftco-animate text-center text-md-left mb-5" data-scrollax=" properties: { translateY: '70%' }">
          	<p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-3"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Contact</span></p>
            <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Contact Us</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section contact-section bg-light">
      <div class="container">
        <div class="row d-flex mb-5 contact-info">
          <div class="col-md-12 mb-4">
            <h2 class="h3">Contact Information</h2>
          </div>
@php
	$Block_Contacts=\App\Model\Contact_info::whereid(1)->get();

@endphp
<?php
$count = 1;
foreach($Block_Contacts as $Contact_Blocks):
//'address', 'contact_no', 'email', 'website_link', 'map_location'
?>

          <div class="w-100"></div>
          <div class="col-md-3">
            <p><span>Address:</span> {{ $Contact_Blocks->address }}</p>
          </div>
          <div class="col-md-3">
            <p><span>Phone:</span> <a href="tel://1234567920">{{ $Contact_Blocks->contact_no }}</a></p>
          </div>
          <div class="col-md-3">
            <p><span>Email:</span> <a href="mailto:{{ $Contact_Blocks->email }}">{{ $Contact_Blocks->email }}</a></p>
          </div>
          <div class="col-md-3">
            <p><span>Website</span> <a href="#">{{ $Contact_Blocks->website_link }}</a></p>
          </div>
        </div>
<?php
$count++;
endforeach;
?>
		  <div class="row block-9">

          <div class="col-md-6 order-md-last d-flex">


          <div class="row">
			  <div class="col-md-12">
				  <form action="{{ url('/saveMessage') }}" class="bg-white p-5 contact-form" method="post">
					  {{ csrf_field() }}
					  <div class="form-group">
						  <input type="text" class="form-control" name="name" placeholder="Your Name" id="" required>
					  </div>
					  <div class="form-group">
						  <input type="text" class="form-control" placeholder="Your Email" id="" name="email" required>
					  </div>
					  <div class="form-group">
						  <input type="text" class="form-control" placeholder="Subject" id="" name="subject" required>
					  </div>
					  <div class="form-group">
						  <textarea name="messages" id="" cols="30" rows="7" class="form-control" placeholder="Message"  required></textarea>
					  </div>
					  <div class="form-group">
						  <button  type="submit" class="btn btn-primary py-3 px-5 text-white" >Send Message</button>
					  </div>
				  </form>
			  </div>
			  <div class="col-md-12">
				  @if($message = Session::get('success'))
					  <div class="alert alert-success alert-block">
						  <button type="button" class="close" data-dismiss="alert">×</button>
						  <strong>{{ $message }}</strong>
					  </div>
				  @endif
			  </div>
		  </div>
          </div>

          <div class="col-md-6 d-flex">
          	<div id="map" class="bg-white"></div>
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