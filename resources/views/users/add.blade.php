@extends('layouts.app')

@section('content')

@if ($errors->any())
  <div class="alert alert-danger">
    <ul class="mb-0">
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

<h2>Add User</h2>
<form action="{{ route('users.add') }}" method="POST" 
enctype="multipart/form-data">
  @csrf
  <div class="mb-3">
    <label>Name</label>
    <input type="text" name="name" class="form-control" required>
  </div>
  <div class="mb-3">
    <label>Email</label>
    <input type="email" name="email" class="form-control" required>
  </div>
  <div class="mb-3">
    <label>Role</label>
    <select name="role" class="form-control" required>
      <option value="" disabled selected>-- Select Role --</option>
      <option value="Admin">Admin</option>
      <option value="Customer">Customer</option>
    </select>
  </div>
  <div class="mb-3">
    <label>Password</label>
    <input type="password" name="password" class="form-control" required>
  </div>
   <div class="mb-3">
    <label>Photo</label>
    <input type="file" name="photo" class="form-control">
  </div>
  <button type="submit" class="btn btn-primary">Add User</button>
</form>
@endsection
