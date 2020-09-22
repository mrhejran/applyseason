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
								<h3>Contact Messages</h3>
							</div>
							<div class="col-md-6 text-right">
								<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
									Update Contact
								</button>

								<!-- The Modal -->
								<div class="modal fade" id="myModal">
									<div class="modal-dialog modal-lg">
										<div class="modal-content">
<?php

foreach($Contact_info as $cont_info):
?>
											<!-- Modal Header -->
											<div class="modal-header">
												<h4 class="modal-title">Contact Information</h4>
												<button type="button" class="close" data-dismiss="modal">&times;</button>
											</div>

											<!-- Modal body -->
											<div class="modal-body" style="text-align: left;">
												<form action="{{ url('update_contact') }}" method="post">
													{{ csrf_field() }}
													<div class="form-group">
														<label>Address</label>
														<textarea name="address" rows="2" class="form-control">{{ $cont_info->address }}</textarea>
													</div>

													<div class="form-group">
														<label>Phone No</label>
														<input type="number"  name="phonenumber" class="form-control" value="{{ $cont_info->contact_no }}">
													</div>

													<div class="form-group">
														<label>Email</label>
														<input type="email" name="email" class="form-control" value="{{ $cont_info->email }}">
													</div>

													<div class="form-group">
														<label>WebSite Address</label>
														<input type="url" name="websiteaddress" class="form-control" value="{{ $cont_info->website_link }}">
													</div>

													<div class="form-group">
														<button type="submit" class="btn btn-primary"> Update</button>
														<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
													</div>

												</form>
											</div>

											<!-- Modal footer -->
											<div class="modal-footer">

											</div>
<?php
 endforeach;
?>
										</div>
									</div>
								</div>

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
											<th>Name</th>
											<th>Email</th>
											<th>Subject</th>
											<th>Message</th>
											<th>Action</th>
										</tr>
										</thead>
										<tbody>
										<?php
										$count = 1;
										foreach($Contact_data as $row):
										?>
										<tr>
											<td>{{$count}}</td>
											<td>{{$row->name}}</td>
											<td>{{$row->email}}</td>
											<td>{{$row->subject}}</td>
											<td>{{$row->messages}}</td>
											<td>
												<a href="{{ url('Delete_message/'.$row->id) }}" class="btn btn-danger"><small class="text-white">Delete</small></a>
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
