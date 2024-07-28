@extends('layouts.main')
@section('title', 'GenieAcs BOT | Transactions')

@section('transactions')
<div class="col-12">
    <div class="card mb-4">
        <div class="card-header">
            <h4 class="card-title">Transactions</h4>
        </div>
        <div class="card-body">
            @if (Auth::user()->role_id == 1)
                <a href="{{ route('show-deleted') }}" class="btn btn-dark btn-sm mb-3">Deleted Transactions</a> 
            @endif
            @if (Session::has('status'))
                <div class="alert alert-{{ Session::get('status') == 'success' ? 'success' : 'danger' }} alert-dismissible fade show" role="alert" id="flashMessage">
                    {{ Session::get('message') }}
                </div>
            @endif                    
            <div class="table-responsive">
                <table class="table align-middle table-hover m-0">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Order ID</th>
                            <th scope="col">Service</th>
                            <th scope="col">Mac Address</th>
                            <th scope="col">Start Date</th>
                            <th scope="col">End Date</th>
                            <th scope="col">Status</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($transactions as $row)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $row->order_id }}</td>
                                <td>
                                    @if ($row->service == 'whatsapp_bot')
                                        Whatsapp BOT
                                    @else
                                        Telegram BOT
                                    @endif
                                </td>
                                <td>{{ $row->mac }}</td>
                                <td>{{ $row->start_date }}</td>
                                <td>{{ $row->end_date }}</td>
                                <td>{{ $row->status }}</td>
                                <td>
                                    @if ($row->status == 'active')
                                        <a href="{{ route('bot-commands', $row->id) }}" class="btn btn-info btn-sm">Command Settings</a>                                                                                    
                                    @else
                                        <a href="{{ route('confirm-trx', $row->id) }}" class="btn btn-info btn-sm">Checkout</a>                                            
                                    @endif 
                                    <form action="{{ route('remove-trx', $row->id) }}" method="post" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Delete Transaction with the order id {{ $row->order_id }}?')" type="submit">Delete</button>                                                
                                    </form>
                                </td>    
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection