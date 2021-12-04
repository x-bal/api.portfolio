@extends('layouts.app', ['title' => 'Edit Contact'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Edit Contact</div>
            </div>

            <div class="card-body">
                <form action="{{ route('contacts.update', $contact->id) }}" method="post" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    @include('contact.form')
                </form>
            </div>
        </div>
    </div>
</div>
@stop