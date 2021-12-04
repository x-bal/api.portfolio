@extends('layouts.app', ['title' => 'Contacts'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h2 class="card-title">Contacts</h2>
                <a href="{{ route('contacts.create') }}" class="btn btn-primary">Add Contact</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Icon</th>
                                <th>Name</th>
                                <th>Contact</th>
                                <th>Link</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($contacts as $contact)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><i class="{{ $contact->icon }}"></i></td>
                                <td>{{ $contact->name }}</td>
                                <td>{{ $contact->contact }}</td>
                                <td>{{ $contact->link }}</td>
                                <td>
                                    <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
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