@extends('layouts.app', ['title' => 'Add Tag'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Add Tag</div>
            </div>

            <div class="card-body">
                <form action="{{ route('tags.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @include('tag.form')
                </form>
            </div>
        </div>
    </div>
</div>
@stop