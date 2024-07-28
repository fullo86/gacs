@extends('layouts.main')
@section('title', 'GenieAcsBot | Home Dashboard')

@section('dashboard')
<div class="app-body">
        <!-- Row start -->
        <div class="row">
            <div class="col-xl-6 col-sm-6 col-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="d-flex flex-row">
                            <div class="icon-box lg rounded-3 bg-light mb-4">
                                <i class="bi bi-whatsapp text-primary fs-2"></i>
                            </div>
                            <div class="ms-4">
                                <p class="mb-2 lh-1 d-flex align-items-center">
                                    <i class="bi text-success me-1 fs-3"></i><span class="text-success me-2">Server Status
                                </p>
                                <h1 class="fw-bold mb-2">Whatsapp BOT</h1>
                                <h6 class="m-0 fw-normal opacity-50">Under Maintenance</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-sm-6 col-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="d-flex flex-row">
                            <div class="icon-box lg rounded-3 bg-light mb-4">
                                <i class="bi bi-telegram text-primary fs-2"></i>
                            </div>
                            <div class="ms-4">
                                <p class="mb-2 lh-1 d-flex align-items-center">
                                    <i class="bi text-success me-1 fs-3"></i><span class="text-success me-2">Server Status
                                </p>
                                <h1 class="fw-bold mb-2">Telegram BOT</h1>
                                <h6 class="m-0 fw-normal opacity-50">Normal</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Row end -->

        <!-- Row start -->
        <div class="row">
            <div class="col-xxl-8 col-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <h4 class="card-title">Overview</h4>
                    </div>
                    <div class="card-body">
                        <!-- Row start -->
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="text-center">
                                    <div class="text-center mb-3">
                                        <p class="text-muted mb-1">This Month</p>
                                        <div class="text-center">
                                            <h2 class="mb-0">$86,990</h2>
                                            <div class="badge bg-success mt-2">
                                                + 21.68%
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-0">
                                        <div class="col-sm-6">
                                            <div class="border-bottom border-end p-3">
                                                <p class="text-muted mb-1">Signups</p>
                                                <h5 class="m-0">3,690</h5>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="border-bottom p-3">
                                                <p class="text-muted mb-1">Sales</p>
                                                <h5 class="m-0">8,765</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-0">
                                        <div class="col-sm-6">
                                            <div class="border-bottom border-end p-3">
                                                <p class="text-muted mb-1">Growth</p>
                                                <h5 class="m-0">18.9%</h5>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="border-bottom p-3">
                                                <p class="text-muted mb-1">Users</p>
                                                <h5 class="m-0">560k</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-0">
                                        <div class="col-sm-6">
                                            <div class="border-end p-3">
                                                <p class="text-muted mb-1">Revenue</p>
                                                <h5 class="m-0">$9,984</h5>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="p-3">
                                                <p class="text-muted mb-1">Expenses</p>
                                                <h5 class="m-0">$6,443</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div id="overview"></div>
                            </div>
                        </div>
                        <!-- Row end -->
                    </div>
                </div>
            </div>
            <div class="col-xxl-4 col-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <h4 class="card-title">Reached Audience</h4>
                    </div>
                    <div class="card-body">
                        <div class="auto-align-graph">
                            <div id="reachedAudience"></div>
                        </div>
                        <div class="grid text-center">
                            <div class="g-col-4">
                                <i class="bi bi-caret-up-fill text-primary"></i>
                                <h3 class="m-0 mt-1">54%</h3>
                                <p class="text-secondary m-0">Male</p>
                            </div>
                            <div class="g-col-4">
                                <i class="bi bi-caret-up-fill text-primary"></i>
                                <h3 class="m-0 mt-1">36%</h3>
                                <p class="text-secondary m-0">Female</p>
                            </div>
                            <div class="g-col-4">
                                <i class="bi bi-caret-down-fill text-danger"></i>
                                <h3 class="m-0 mt-1">10%</h3>
                                <p class="text-secondary m-0">Other</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Row end -->
</div>					
@endsection