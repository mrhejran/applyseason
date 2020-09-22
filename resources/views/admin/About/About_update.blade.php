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
								<h3>About Page</h3>
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
									$Block_Data=\App\Model\Page_Content::whereid('1')->get();

								@endphp
								@foreach($Block_Data as $block)
								<div class="row">
									<div class="col-md-12">
										<p>Section 1</p>
									</div>
									<div class="col-md-6">
										<form action="{{ url('update_page_content') }}" method="post" enctype="multipart/form-data">
											{{ csrf_field() }}
											<div class="form-group">
												<label><small>Title</small></label>
												<input type="text" class="form-control" name="title" value="{{ $block->section_title }}">
												<input type="hidden" class="form-control" name="page_id" value="{{ $block->id }}">
											</div>
											<div class="form-group">
												<label><small>Image</small></label>
												<input type="file" class="form-control" name="image_section">
											</div>
											<div class="form-group">
												<label><small>Description</small></label>
												<textarea name="description" rows="5">{{ $block->section_description }}</textarea>
											</div>
											<div class="form-group">
												<button type="submit" class="btn btn-primary">Update</button>
											</div>
										</form>
									</div>
									<div class="col-md-6">
										<div>
											<img src="{{ asset('public/page_content/'.$block->section_img) }}" class="img-fluid" >
										</div>
									</div>
								@endforeach
								</div>
							</div>


							<hr>

							<div class="panel-body">


								<div class="row">
									<div class="col-md-6">
										<p>Happy Clients </p>

									</div>

									<div class="col-md-6 text-right">
										<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
											Create Happy Clients
										</button>
										<div class="modal fade" id="myModal">
											<div class="modal-dialog modal-lg">
												<div class="modal-content text-left">
													<div class="modal-header">
														<h4 class="modal-title">Happy Clients</h4>
														<button type="button" class="close" data-dismiss="modal">&times;</button>
													</div>
													<div class="modal-body">
														<form action="{{ url('create_clients') }}" method="post" enctype="multipart/form-data">
															{{ csrf_field() }}
															<div class="form-group">
																<label><small>Name</small></label>
																<input type="text" class="form-control" name="title" >
															</div>
															<div class="form-group">
																<label><small>About</small></label>
																<input type="text" class="form-control" name="about" >
															</div>
															<div class="form-group">
																<label><small>Image</small></label>
																<input type="file" class="form-control" name="clients_img">
															</div>
															<div class="form-group">
																<label><small>Description</small></label>
																<textarea name="description" rows="5"></textarea>
															</div>
															<div class="form-group">
																<button type="submit" class="btn btn-primary">Create</button>
																<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
															</div>
														</form>
													</div>
													<div class="modal-footer">

													</div>

												</div>
											</div>
										</div>

									</div>
									<div class="col-md-12">
										<div class="table-responsive">
											<table id="example1" class="table table-bordered table-striped">
												<thead>
												<tr>
													<th>Sr No</th>
													<th>Image</th>
													<th>Name</th>
													<th>About</th>
													<th>Description</th>
													<th>Action</th>
												</tr>
												</thead>
												<tbody>
												@php
													$Block_Client=\App\Model\HappyClients::orderBy('ID','DESC')->get();

												@endphp
												<?php
												$count = 1;
												foreach($Block_Client as $Client):
												?>
												<tr>
													<td>{{$count}}</td>
													<td> <img src="{{ asset('public/clientImages/'.$Client->image) }}" style="height: 70px;"></td>
													<td>{{$Client->name}}</td>
													<td>{{$Client->type}}</td>
													<td>{{$Client->description}}</td>
													<td>
														<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal{{ $Client->id }}">
															Edit
														</button>
														<div class="modal fade" id="myModal{{ $Client->id }}">
															<div class="modal-dialog modal-lg">
																<div class="modal-content text-left">
																	<div class="modal-header">
																		<h4 class="modal-title">Happy Clients Update</h4>
																		<button type="button" class="close" data-dismiss="modal">&times;</button>
																	</div>
																	<div class="modal-body">
																		<form action="{{ url('update_clients') }}" method="post" enctype="multipart/form-data">
																			{{ csrf_field() }}
																			<div class="form-group">
																				<label><small>Name</small></label>
																				<input type="text" class="form-control" name="title" value="{{$Client->name}}">
																				<input type="hidden" class="form-control" name="id" value="{{$Client->id}}">
																			</div>
																			<div class="form-group">
																				<label><small>About</small></label>
																				<input type="text" class="form-control" name="about" value="{{$Client->type}}" >
																			</div>
																			<div class="form-group">
																				<label><small>Image</small></label>
																				<input type="file" class="form-control" name="clients_img">
																			</div>
																			<div class="form-group">
																				<label><small>Description</small></label>
																				<textarea name="description" rows="5">{{$Client->description}}</textarea>
																			</div>
																			<div class="form-group">
																				<button type="submit" class="btn btn-primary">Update</button>
																				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
																			</div>
																		</form>
																	</div>
																	<div class="modal-footer">

																	</div>

																</div>
															</div>
														</div>
														<a href="{{ url('Delete_client/'.$Client->id) }}" class="btn btn-danger"><small class="text-white">Delete</small></a>
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
					</div>
				</div>
			</div><!-- /.container-fluid -->
	</section>


@endsection
