@extends('layouts.main')
@section('title', 'GenieAcsBot | Account Profile')

@section('edit-user')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Account Settings</h4>
    </div>
    <div class="card-body">
        <div class="custom-tabs-container">
            <ul class="nav nav-tabs" id="customTab2" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="tab-oneA" data-bs-toggle="tab" href="#oneA" role="tab"
                        aria-controls="oneA" aria-selected="true">Personal</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="oneA" role="tabpanel">
                    <!-- Row start -->
                    <div class="row justify-content-between">
                        <form action="{{ route('update-account', $account->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="col-sm-4 col-12">
                                <div class="card mb-3">
                                    <img src="{{ asset('/storage/images/'. $account->image) }}">
                                </div>
                            </div>

                            <div class="col-sm-12 col-12">
                                <div class="card mb-3">
                                    <div class="card-header">
                                        <h5 class="card-title">Personal Details</h5>
                                    </div>
                                    <div class="card-body">
                                        <!-- Row start -->
                                        <div class="row gx-3">
                                            <div class="col-6">
                                                <!-- Form Field Start -->
                                                <div class="mb-3">
                                                    <label for="first_name" class="form-label">First Name</label>
                                                    <input type="text" name="first_name" class="form-control" id="first_name"
                                                        placeholder="first_name" value="{{ $account->first_name }}" />
                                                </div>

                                                <!-- Form Field Start -->
                                                <div class="mb-3">
                                                    <label for="email" class="form-label">Email</label>
                                                    <input type="email" name="email" class="form-control" id="Email"
                                                        placeholder="email" value="{{ $account->email }}"/>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <!-- Form Field Start -->
                                                <div class="mb-3">
                                                    <label for="last_name" class="form-label">Last Name</label>
                                                    <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Last Name"
                                                        value="{{ $account->last_name }}" />
                                                </div>

                                                <!-- Form Field Start -->
                                                <div class="mb-3">
                                                    <label for="phone" class="form-label">Phone Number</label>
                                                    <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone"
                                                        value="{{ $account->phone }}" oninput="this.value = this.value.replace(/[^0-9]/g, '');"/>
                                                </div>

                                            </div>
                                        </div>
                                        <!-- Row end -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Row end -->
                        <div class="d-flex gap-2 justify-content-end">
                            <button type="submit" class="btn btn-success">
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>    
@endsection