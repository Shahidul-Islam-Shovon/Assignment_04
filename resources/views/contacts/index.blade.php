@extends('layouts')

@section('title', 'Home Page')

@section('content')
    <div class="container">
        <h1 class="display-4">Contact List</h1>

        <!-- Search Form -->
        <form method="GET" action="{{ route('contacts.index') }}">
            <input style="width: 46%;margin-top:35px;" class="form-control" type="text" name="search" placeholder="Search by name or email" value="{{ request('search') }}">
            <button type="submit" class="mt-2 btn btn-primary">Search</button>
        </form>
        <!-- Display Success Message -->
           <div class="mt-3 mb-2">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('delete'))
                <div class="alert alert-danger">
                    {{ session('delete') }}
                </div>
            @endif

            <!-- Display Validation Errors -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
           </div>
        <!-- Contacts Table -->
        <table style="margin-top:28px;" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th><a href="{{ route('contacts.index', ['sort' => 'name', 'direction' => request('direction') === 'asc' ? 'desc' : 'asc']) }}">Name</a></th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th><a href="{{ route('contacts.index', ['sort' => 'created_at', 'direction' => request('direction') === 'asc' ? 'desc' : 'asc']) }}">Created At</a></th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @if ($contacts->isEmpty())
                    <tr>
                        <td colspan="6" class="text-center">No info found!</td>
                    </tr>
                @else
                    @foreach($contacts as $contact)
                        <tr>
                            <td>{{ $contact->name }}</td>
                            <td>{{ $contact->email }}</td>
                            <td>{{ $contact->phone }}</td>
                            <td>{{ $contact->address }}</td>
                            <td>{{ $contact->created_at->format('d-m-Y') }}</td>
                            <td>
                                <a href="{{ route('contacts.show', $contact->id) }}"><button class="btn btn-success btn-sm"><i class="fa-solid fa-eye"></i></button></a>

                                <a href="{{ route('contacts.edit', $contact->id) }}"><button class="btn btn-primary btn-sm"><i class="fa-solid fa-pen-to-square"></i></button></a>

                                <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
@endsection


