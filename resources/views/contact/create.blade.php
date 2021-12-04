@extends('layouts.app', ['title' => 'Add Contact'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Add Contact</div>
            </div>

            <div class="card-body">
                <form action="{{ route('contacts.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @include('contact.form')
                </form>
            </div>
        </div>
    </div>
</div>
@stop