@extends('layouts.main')
@section('title', 'GenieAcsBot | Change Password')

@section('change-password')							
<!-- Row start -->
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Change Password</h4>
			</div>
			<div class="card-body">
				<div class="custom-tabs-container">
					<div class="tab-content">
						<div class="tab-pane fade show active" id="oneA" role="tabpanel">
							<!-- Row start -->
							<div class="row justify-content-center">
								<div class="col-sm-8 col-12">
									<div class="card mb-3">
										<div class="card-body">
											<div class="row gx-3">
												<div class="col-12">
													@if ($errors->any())
														<div class="alert alert-danger alert-dismissible fade show" role="alert">
															<ul>
																@foreach ($errors->all() as $error)
																	<li>{{ $error }}</li>
																@endforeach
															</ul>
														</div>
													@endif
													@if (Session::has('status'))
													<div class="alert alert-{{ Session::get('status') == 'success' ? 'success' : 'danger' }} alert-dismissible fade show" role="alert" id="flashMessage">
														{{ Session::get('message') }}
													</div>
													@endif			
													<form action="{{ route('account-changepwd', $account->id) }}" method="post">
														@csrf
														@method('PATCH')
														<!-- Form Field Start -->
														<div class="mb-3">
															<label for="old_password" class="form-label">Current Password</label>
															<input type="password" name="old_password" class="form-control" id="old_password"
																placeholder="Enter Current Password" required/>
														</div>
														<!-- Form Field Start -->
														<div class="mb-3">
															<label for="new_password" class="form-label">New Password</label>
															<input type="password" name="new_password" class="form-control" id="new_password"
																placeholder="Enter New Password" required/>
														</div>
														<!-- Form Field Start -->
														<div class="mb-3">
															<label for="repeat_password" class="form-label">Confirm New
																Password</label>
															<input type="password" name="repeat_password" class="form-control" id="repeat_password"
																placeholder="Confirm New Password" required/>
														</div>
														<div class="d-flex gap-2 justify-content-end">
															<button type="submit" class="btn btn-success">
																Update Password
															</button>
														</div>							
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Row end -->
@endsection