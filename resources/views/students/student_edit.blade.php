@extends('layouts.app')

@section('content')
<h2>Edit Student</h2>

<form action="{{ route('students.edit') }}" method="POST">
  @csrf
  @method('PUT')
  <input type="hidden" name="id" value="{{ $post->id }}">

  <div class="mb-3">
    <label>Name</label>
    <input type="text" name="name" value="{{ $post->name }}" class="form-control" required>
  </div>

  <div class="mb-3">
    <label>Type</label>
    <input type="text" name="type" value="{{ $post->type }}" class="form-control" required>
  </div>

  <button type="submit" class="btn btn-warning">
    Update Student
  </button>
  <a href="{{ route('index') }}">Go to index</a>
</form>

@endsection
