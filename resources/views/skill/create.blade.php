@extends('layouts.app', ['title' => 'Add Skill'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Add Skill</div>
            </div>

            <div class="card-body">
                <form action="{{ route('skills.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @include('skill.form')
                </form>
            </div>
        </div>
    </div>
</div>
@stop