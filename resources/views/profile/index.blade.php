@extends('layouts.app', ['title' => 'Profile'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h2 class="card-title">Profile</h2>
                <a href="{{ route('profile.create') }}" class="btn btn-primary">Add Profile</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Full Name</th>
                                <th>Role</th>
                                <th>About</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($profiles as $profile)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $profile->full_name }}</td>
                                <td>{{ $profile->role }}</td>
                                <td>{{ $profile->about }}</td>
                                <td><img src="{{ asset('storage/' . $profile->image) }}" alt="" width="100px"></td>
                                <td>
                                    <a href="{{ route('profile.edit', $profile->id) }}" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
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
@stop