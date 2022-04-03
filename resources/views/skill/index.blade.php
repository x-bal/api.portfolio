@extends('layouts.app', ['title' => 'Skills'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h2 class="card-title">Skills</h2>
                <a href="{{ route('skills.create') }}" class="btn btn-primary">Add Skill</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Logo</th>
                                <th>Name</th>
                                <th>Experience</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($skills as $skill)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><img src="{{ asset('storage/' . $skill->logo) }}" alt="" width="70px"></td>
                                <td>{{ $skill->name }}</td>
                                <td>{{ $skill->experience }}</td>
                                <td>
                                    <a href="{{ route('skills.edit', $skill->id) }}" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
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