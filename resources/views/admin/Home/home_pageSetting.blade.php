@extends('layouts.admin')

@section('scripts')
	<script type="text/javascript">
		$("#example1").DataTable();
	</script>
@endsection

@section('main_content')
	<script src="{{ asset('public/js/tinymce.min.js') }}" referrerpolicy="origin"></script>
	<script>tinymce.init({selector:'textarea'});</script>
	<style>
		.tox-tinymce-aux {
			display: none;
		}
	</style>
	<section class="content">
		<div class="container-fluid">
			<div class="invoice p-3 mb-3">
				<div class="row">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-6">
								<h3>Home Page Setting</h3>
							</div>
						</div>

						<br />
						@if($message = Session::get('success'))
							<div class="alert alert-success alert-block">
								<button type="button" class="close" data-dismiss="alert">×</button>
								<strong>{{ $message }}</strong>
							</div>
						@endif
						<div class="panel panel-default">
							<div class="panel-heading">

							</div>
							<div class="panel-body">
								@php
									$Block_Data=\App\Model\HomePage::whereid('1')->get();

								@endphp
								@foreach($Block_Data as $block)
									<div class="row">
										<div class="col-md-12">
											<p>Site Setting</p>
										</div>
										<div class="col-md-6">
											<form action="{{ url('update_home_content') }}" method="post" enctype="multipart/form-data">
												{{ csrf_field() }}
												<div class="form-group">
													<label><small>Page Title</small></label>
													<input type="text" class="form-control" name="pagetitle" value="{{ $block->page_title }}">
												</div>

												<div class="form-group">
													<label><small>Site Title</small></label>
													<input type="text" class="form-control" name="sitetitle" value="{{ $block->slide_logo }}">
												</div>

												<div class="form-group">
													<label><small>Slide Title</small></label>
													<input type="text" class="form-control" name="slidetitle" value="{{ $block->slide_title }}">
												</div>

												<div class="form-group">
													<label><small>About Description</small></label>
													<textarea class="" name="aboutdes" rows="5">{{ $block->slide_about }}</textarea>
												</div>

												<div class="form-group">
													<label><small>Subcribe Description</small></label>
													<textarea class="" name="subcribdes" rows="5">{{ $block->slide_subscrib }}</textarea>
												</div>
												<div class="form-group">
													<label><small>Slide Image</small></label>
													<input type="file" class="form-control" name="image_section">
												</div>

												<div class="form-group">
													<button type="submit" class="btn btn-primary">Update</button>
												</div>
											</form>
										</div>
										<div class="col-md-6">
											<div>
												<img src="{{ asset('public/page_content/'.$block->slide_imge) }}" class="img-fluid" >
											</div>
										</div>
										@endforeach
									</div>
							</div>


							<hr>

							<div class="panel-body">


								<div class="row">
									<div class="col-md-6">
										<p>Counter Setting </p>

									</div>

									<div class="col-md-6 text-right">

									</div>Counter
									<div class="col-md-12">
@php
	$Block_Counter=\App\Model\Counter::whereid('1')->get();

@endphp
@foreach($Block_Counter as $Counter)
										<form action="{{ url('update_counter') }}" method="post" enctype="multipart/form-data">
											{{ csrf_field() }}

											<div class="row">
												<div class="col-md-3">
													<div class="form-group">
														<label><small>Jobs</small></label>
														<input type="text" class="form-control" name="jobs" value="{{ $Counter->cout_Jobs }}" >
													</div>
												</div>
												<div class="col-md-3">
													<div class="form-group">
														<label><small>Members</small></label>
														<input type="text" class="form-control" name="members"  value="{{ $Counter->cout_Members }}">
													</div>
												</div>
												<div class="col-md-3">
													<div class="form-group">
														<label><small>Resume</small></label>
														<input type="text" class="form-control" name="resume"  value="{{ $Counter->cout_Resume }}">
													</div>
												</div>
												<div class="col-md-3">
													<div class="form-group">
														<label><small>Company</small></label>
														<input type="text" class="form-control" name="company"  value="{{ $Counter->cout_Company }}">
													</div>
												</div>
												<div class="col-md-12">
													<div class="form-group">
														<button type="submit" class="btn btn-primary">Update</button>
													</div>
												</div>
											</div>
										</form>
@endforeach
									</div>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div><!-- /.container-fluid -->
	</section>


@endsection
