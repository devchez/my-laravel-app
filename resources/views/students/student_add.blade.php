
@extends('layouts.app')

@section('content')
    <h1>Create a Student</h1>
    <form action="{{ route('students.add') }}" method="POST">
    @csrf
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" 
            class="form-control" 
            >
        </div>
        <div class="mb-3">
            <label>Type</label>
            <input type="text" name="type" 
             class="form-control"
             required>
        </div>
        <button type="submit" class="btn btn-primary">
            Add Student</button>
        <a href="{{ route('index') }}">Go to index</a>
    </form>

@endsection
