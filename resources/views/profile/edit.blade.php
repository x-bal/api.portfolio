@extends('layouts.app', ['title' => 'Edit Profile'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Edit Profile</div>
            </div>

            <div class="card-body">
                <form action="{{ route('profile.update', $profile->id) }}" method="post" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    @include('profile.form')
                </form>
            </div>
        </div>
    </div>
</div>
@stop