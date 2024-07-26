@extends('layouts.main')
@section('title', 'GenieAcs BOT | Transactions Deleted')

@section('show-deleted')
<div class="col-12">
    <div class="card mb-4">
        <div class="card-header">
            <h4 class="card-title">Transactions Deleted</h4>
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
                            <th scope="col">Date Deleted</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($TrxDeleted as $row)
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
                                <td>{{ \Carbon\Carbon::parse($row->deleted_at)->format('H:i:s d-m-Y') }}</td>
                                <td>
                                    <a href="{{ route('restore-trx', $row->id) }}" onclick="return confirm('Restore Transaction {{ $row->order_id }}?')" class="mb-xs mt-xs mr-xs btn btn-xs btn-success edit-row">
                                        <i class="fa fa-refresh"></i> Restore
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