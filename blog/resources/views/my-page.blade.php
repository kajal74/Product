<!-- my-page.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>My Page</h1>

        <!-- Button -->
        <a href="{{ route('my-button') }}" class="btn btn-primary">Click Me</a>
    </div>
@endsection
