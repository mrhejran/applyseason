
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

						<br />
						@if($message = Session::get('success'))
							<div class="alert alert-success alert-block">
								<button type="button" class="close" data-dismiss="alert">×</button>
								<strong>{{ $message }}</strong>
							</div>
						@endif
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title">Update Blog</h3>
							</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-md-12">
<?php
foreach($blog_data as $row):
?>


										<form method="post" enctype="multipart/form-data" action="{{ url('/update_blog') }}">
											{{ csrf_field() }}
											<div class="form-group">
												<label><small>Blog Title</small></label>
												<input type="text" class="form-control" name="title" value="{{$row->TITLE}}">
												<input type="hidden" class="form-control" name="id" value="{{$row->ID}}">
											</div>

											<div class="form-group">
												<label><small>Blog Date</small></label>
												<input type="date" class="form-control" name="date" value="{{$row->DATE_BLOG}}">
											</div>

											<div class="form-group">
												<img src="{{ asset('public/blogImages/'.$row->IMG_BLOG) }}" style="height: 200px;">
											</div>
											<div class="form-group">
												<label><small>Image</small></label>
												<input type="file" class="form-control" name="blogimage">
											</div>


											<div class="form-group">
												<label><small>Blog Description</small></label>
												<textarea name="description"  rows="20">{{$row->DEC_BLOG}}</textarea>
											</div>

											<div class="form-group">
												<button type="submit" class="btn btn-primary">Update</button>
											</div>
										</form>
<?php
endforeach;
?>										</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div><!-- /.container-fluid -->
	</section>


@endsection
