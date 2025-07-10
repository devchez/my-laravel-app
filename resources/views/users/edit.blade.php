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

<h2>Edit User</h2>

<form action="{{ route('users.edit', $user->id) }}" method="POST" enctype="multipart/form-data">
  @csrf
  @method('PUT')

  <div class="mb-3">
    <label>Name</label>
    <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
  </div>

  <div class="mb-3">
    <label>Email</label>
    <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
  </div>

  <div class="mb-3">
    <label>Role</label>
    <select name="role" class="form-control" required>
      <option value="">-- Select Role --</option>
      <option value="Admin" {{ old('role', $user->role) == 'Admin' ? 'selected' : '' }}>Admin</option>
      <option value="Customer" {{ old('role', $user->role) == 'Customer' ? 'selected' : '' }}>Customer</option>
    </select>
  </div>

  <div class="mb-3">
    <label>Photo (Optional)</label><br>
    @if($user->photo)
      <img src="{{ asset('storage/uploads/' . $user->photo) }}" width="80" class="mb-2">
    @endif
    <input type="file" name="photo" class="form-control" accept="image/*">
  </div>

  <button type="submit" class="btn btn-warning">Update User</button>
</form>
@endsection
