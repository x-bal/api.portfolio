@extends('layouts.app', ['title' => 'Edit Project'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Edit Project</div>
            </div>

            <div class="card-body">
                <form action="{{ route('projects.update', $project->id) }}" method="post" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    @include('project.form')
                </form>
            </div>
        </div>
    </div>
</div>
@stop