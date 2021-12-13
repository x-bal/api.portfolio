@extends('layouts.app', ['title' => 'Projects'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h2 class="card-title">Projects</h2>
                <a href="{{ route('projects.create') }}" class="btn btn-primary">Add Project</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Tags</th>
                                <th>Thumbnail</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($projects as $project)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><a target="_blank" href="https://{{ $project->link }}">{{ $project->name }}</a></td>
                                <td>{{ $project->description }}</td>
                                <td>
                                    @foreach($project->tags as $tag)
                                    <span class="badge bg-secondary">{{ $tag->name }}</span>
                                    @endforeach
                                </td>
                                <td><img src="{{ asset('files/' . $project->thumbnail) }}" alt="" width="100px"></td>
                                <td>
                                    <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
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