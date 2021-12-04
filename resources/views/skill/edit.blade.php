@extends('layouts.app', ['title' => 'Edit Skill'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Edit Skill</div>
            </div>

            <div class="card-body">
                <form action="{{ route('skills.update', $skill->id) }}" method="post" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    @include('skill.form')
                </form>
            </div>
        </div>
    </div>
</div>
@stop