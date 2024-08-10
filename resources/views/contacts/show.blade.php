@extends('layouts')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-primary text-white text-center">
            <h2>Contact Details</h2>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-sm-3 text-right font-weight-bold">Name:</div>
                <div class="col-sm-9">{{ $contact->name }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-3 text-right font-weight-bold">Email:</div>
                <div class="col-sm-9">{{ $contact->email }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-3 text-right font-weight-bold">Phone:</div>
                <div class="col-sm-9">{{ $contact->phone }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-3 text-right font-weight-bold">Address:</div>
                <div class="col-sm-9">{{ $contact->address }}</div>
            </div>
        </div>
        <div class="card-footer text-center">
            <a href="{{ route('contacts.index') }}" class="btn btn-secondary">Back to list</a>
        </div>
    </div>
</div>
@endsection
