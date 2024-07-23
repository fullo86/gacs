@extends('layouts.main')
@section('title', 'GenieAcs BOT | Transactions')

@section('transactions')
<div class="col-12">
    <div class="card mb-4">
        <div class="card-header">
            <h4 class="card-title">Transactions</h4>
        </div>
        <div class="card-body">
            <div class="border border-dark rounded-3">
                <table class="table align-middle table-hover m-0">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Order ID</th>
                            <th scope="col">Service</th>
                            <th scope="col">Mac Address</th>
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
                                <td>{{ $row->status }}</td>
                                    <td>
                                        <a href="{{ route('confirm-trx', $row->id) }}" class="btn btn-info btn-sm">Checkout
                                        </a>
                                    </td>    
                                </form>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>    
@endsection