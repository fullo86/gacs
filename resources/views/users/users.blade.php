@extends('layouts.main')
@section('title', 'GenieAcsBot | UserList ')

@section('users')
<div class="col-12">
    <div class="card mb-4">
        <div class="card-header">
            <h4 class="card-title">Users</h4>
        </div>
        <div class="card-body">
            <div class="border border-dark rounded-3">
                <table class="table align-middle table-hover m-0">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Username</th>
                            <th scope="col">Status</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($listUsers as $user)
                            @if ($user->role_id == 2)                            
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $user->username }}</td>
                                <td>
                                    @if ($user->status == 0)
                                        Not Active
                                    @else
                                        Active                                    
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-info btn-sm" href="#"><i class="bi bi-pencil"></i>
                                    </a>
                                </td>
                            </tr>
                            @endif        
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection