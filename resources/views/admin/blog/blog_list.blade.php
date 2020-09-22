@extends('layouts.admin')

@section('scripts')
	<script type="text/javascript">
		$("#example1").DataTable();
	</script>
@endsection

@section('main_content')

	<section class="content">
		<div class="container-fluid">
			<div class="invoice p-3 mb-3">
				<div class="row">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-6">
								<h3>Blogs List</h3>
							</div>
							<div class="col-md-6 text-right">
								<a href="{{ url('Create_blog') }}" class="btn btn-primary btn-sm">Create Blog</a>
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
								<div class="table-responsive">
									<table id="example1" class="table table-bordered table-striped">
										<thead>
										<tr>
											<th>Sr No</th>
											<th>Image</th>
											<th>Title</th>
											<th>Date</th>
											<th>Action</th>
										</tr>
										</thead>
										<tbody>
										<?php
										$count = 1;
										foreach($blog_data as $row):
												////SELECT `ID`, `TITLE`, `DATE_BLOG`, `AUTH_BLOG`, `DEC_BLOG`, `IMG_BLOG`, `STATUS_BLOG` FROM `blog` WHERE 1
										?>
										<tr>
											<td>{{$count}}</td>
											<td> <img src="{{ asset('public/blogImages/'.$row->IMG_BLOG) }}" style="height: 70px;"></td>
											<td>{{$row->TITLE}}</td>
											<td>{{$row->DATE_BLOG}}</td>
											<td>
												<a href="{{ url('Edit_Blog/'.$row->ID) }}" class="btn btn-primary"><small class="text-white">Edit</small></a>
												<a href="{{ url('Delete_Blog/'.$row->ID) }}" class="btn btn-danger"><small class="text-white">Delete</small></a>
											</td>

										</tr>
										<?php
										$count++;
										endforeach;
										?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div><!-- /.container-fluid -->
	</section>


@endsection
