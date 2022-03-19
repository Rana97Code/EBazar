@extends('backend.Layouts.app')
@section('admin-product')
    <div class="page-wrapper">
			
     <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
			<div class="row">
				<div class="col-sm-12">
                    <label for="">
					<h3 class="page-title">Products List</h3></label>
					<div style="text-align: right;"> <a data-toggle="modal" href="#edit_invoice_report" class="btn btn-sm bg-success-light mr-2">	<i class="fe fe-plus"></i>  Add Product</a>
					
				    </div>
				</div>
			</div>
		</div>
		<!-- /Page Header -->



        <div class="row">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-body">
                               
									<div class="table-responsive">
										<table class="datatable table table-hover table-center mb-0">
											<thead>
												<tr>
													<th>Product ID</th>
													<th>Product Category</th>
													<th>Product Name</th>
													<th>Product Image</th>
													<th>Product Price</th>
													<th>Product Quantity</th>
													<th>Created Date</th>
													<th class="text-center">Status</th>
													<th class="text-right">Actions</th>
												</tr>
											</thead>
											<tbody>
											@foreach ($product as $row)
												<tr>
													<td><a href="invoice.html">{{ $row->p_id }}</td>
													<td>{{ $row->p_category }}</td>
													<td>{{ $row->p_name }}</td>
													<td>
														<h2 class="table-avatar">
															<a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset('backend/images/productImage/'.$row->p_image)}}" alt="{{ $row->p_image }}"></a>
															
														</h2>
													</td>
													<td>{{ $row->p_price }}</td>
													<td>{{ $row->quantity }}</td>
													<td>{{ $row->created_at }}</td>
													<td class="text-center">
														<span class="badge badge-pill bg-success inv-badge">{{ $row->name }}</span>
													</td>
													<td class="text-right">
														<div class="actions">
															
															<a data-toggle="modal" href="#edit_invoice_report" class="btn btn-sm bg-success-light mr-2">
																<i class="fe fe-pencil"></i> Edit</a>
															<a class="btn btn-sm bg-danger-light" data-toggle="modal" href="#delete_modal">
																<i class="fe fe-trash"></i> Delete
															</a>
														</div>
													</td>
												</tr>
												@endforeach
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>			
					</div>
					
				</div>			
			</div>
			<!-- /Page Wrapper -->
			



            <!-- Add product Modal -->
			<div class="modal fade" id="edit_invoice_report" aria-hidden="true" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document" >
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Add New Product</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form method="POST" enctype="multipart/form-data" action="{{ route('p_upload') }}">
								@csrf
								<div class="row form-row">
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>Product ID</label>
											<input type="text" name="p_id" class="form-control" placeholder="Inter a ID">
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>Product Category</label>
											<input type="text" class="form-control" name="p_category" placeholder="	#PT002">
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>Product Name</label>
											<input type="text" class="form-control" name="p_name" placeholder="Product Name">
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>Product Image</label>
											<input type="file" name="p_image"  class="form-control">
											
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>Product Price</label>
											<input type="text"  class="form-control" name="p_price" placeholder="Inter Product Price">
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>Product Quantity</label>
											<input type="text"  class="form-control" name="quantity" placeholder="Total Quantity">
										</div>
									</div>
									
								</div>
								<button type="submit" class="btn btn-primary btn-block">Upload Product</button>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- /Add Product Modal -->



			<!-- Edit Details Modal -->
			<div class="modal fade" id="edit_invoice_report" aria-hidden="true" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document" >
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Edit Invoice Report</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form>
								<div class="row form-row">
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>Invoice Number</label>
											<input type="text" class="form-control" value="#INV-0001">
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>Patient ID</label>
											<input type="text" class="form-control" value="	#PT002">
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>Patient Name</label>
											<input type="text" class="form-control" value="R Amer">
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>Patient Image</label>
											<input type="file"  class="form-control">
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>Total Amount</label>
											<input type="text"  class="form-control" value="$200.00">
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>Created Date</label>
											<input type="text"  class="form-control" value="29th Oct 2019">
										</div>
									</div>
									
								</div>
								<button type="submit" class="btn btn-primary btn-block">Save Changes</button>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- /Edit Details Modal -->
		
			<!-- Delete Modal -->
			<div class="modal fade" id="delete_modal" aria-hidden="true" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document" >
					<div class="modal-content">
					<!--	<div class="modal-header">
							<h5 class="modal-title">Delete</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>-->
						<div class="modal-body">
							<div class="form-content p-2">
								<h4 class="modal-title">Delete</h4>
								<p class="mb-4">Are you sure want to delete?</p>
								<button type="button" class="btn btn-primary">Save </button>
								<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /Delete Modal -->
        </div>
		<!-- /Main Wrapper -->


       <div>
    <div>
@endsection