@extends('layouts.app', ['title' => 'Create Profile'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Create Profile</div>
            </div>

            <div class="card-body">
                <form action="{{ route('profile.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @include('profile.form')
                </form>
            </div>
        </div>
    </div>
</div>
@stop