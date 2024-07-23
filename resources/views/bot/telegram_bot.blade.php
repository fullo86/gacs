@extends('layouts.main')
@section('title', 'GenieAscBot | Telegram BOT')

@section('bot_telegram')
<!-- Container starts -->
<div class="container-fluid">

    <!-- Row start -->
    <div class="row">
        <div class="col-xxl-12">
            <div class="card mb-3">
                <div class="card-header">
                     <h5 class="card-title">Telegram BOT</h5>
                </div>
                <form action="{{ route('store_inform_telegram_bot') }}" method="post">
                    @csrf
                    <div class="card-body">
                        @if (Session::has('status'))
                        <div class="alert alert-{{ Session::get('status') == 'success' ? 'success' : 'danger' }} alert-dismissible fade show" role="alert" id="flashMessage">
                            {{ Session::get('message') }}
                        </div>
                        @endif                                
                        <!-- Row start -->
                        <div class="row gx-3 justify-content-center">
                            <div class="col-lg-8 col-sm-4 col-12">
                                <div class="mb-3">
                                    <label class="form-label">TOKEN BOT Telegram</label>
                                    <input type="text" name="token" class="form-control" placeholder="Enter Token" />
                                </div>
                            </div>
                            <div class="col-lg-8 col-sm-4 col-12">
                                <div class="mb-3">
                                    <label class="form-label">URL API GenieAcs</label>
                                    <input type="text" name="url" class="form-control" placeholder="Enter Url e.g: (Port 7557 / Example http://12.34.56.78:7557)" />
                                </div>
                            </div>
                            <div class="col-lg-8 col-sm-4 col-12">
                                <div class="col-lg-8 col-sm-4 col-12">
                                    <div class="mb-3">
                                        <label class="form-label">Mac Address</label>
                                        <input type="text" name="mac" class="form-control" placeholder="Enter Mac Address" />
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">CHAT ID (Personal/Group)</label>
                                    <input type="text" class="form-control" placeholder="" disabled/>
                                </div>
                            </div>
                        </div>
                        <!-- Row end -->
                    </div>
                    <div class="card-footer">
                        <div class="d-flex gap-2 justify-content-end">
                            <button type="submit" class="btn btn-success">
                                Submit
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Row end -->

</div>
<!-- Container ends -->
@endsection