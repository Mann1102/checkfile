<!-- resources/views/admin/show_data.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Data Details</h1>
        @if(isset($data))
            <!-- Display details for a specific ID -->
            <p>Name: {{ $data->name }}</p>
            <p>Email: {{ $data->email }}</p>
            <!-- Add more fields as needed -->

        @else
            <!-- Display all entries with pagination -->
            @foreach($allData as $data)
                <div class="mb-3">
                    <p>Name: {{ $data->name }}</p>
                    <p>Email: {{ $data->email }}</p>
                    <!-- Add more fields as needed -->
                </div>
            @endforeach

            {{ $allData->links() }}
        @endif
    </div>
@endsection
