@extends('layouts.app', ['title' => 'Add Project'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Add Project</div>
            </div>

            <div class="card-body">
                <form action="{{ route('projects.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @include('project.form')
                </form>
            </div>
        </div>
    </div>
</div>
@stop