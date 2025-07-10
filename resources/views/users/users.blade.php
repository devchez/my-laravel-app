@extends('layouts.app')

@section('content')
@if(session('success'))
  <div class="alert alert-success">{{ session('success') }}</div>
@endif

<h2>Users</h2>
<a href="{{ route('users.add.form') }}" 
class="btn btn-success mb-3">Add User</a>

<table class="table">
  <thead>
    <tr>
      <th>#</th>
      <th>Name</th>
      <th>Email</th>
      <th>Type</th>
      <th>Image</th> 
      <th>Created At</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach($users as $user)
    <tr>
      <td>{{ $user->id }}</td>
      <td>{{ $user->name }}</td>
      <td>{{ $user->email }}</td>
      <td>{{ $user->role }}</td>
      <td>
          <img src="{{ asset('storage/uploads/' . $user->photo) }}" 
          width="50" height="50" class="rounded-circle">
      </td>
      <td>
        {{ \Carbon\Carbon::parse($user->created_at)->format('F d, Y, gA') }}
      </td>
      <td> 
        <a href="{{ route('users.edit.form', $user->id) }}" 
        class="btn btn-warning btn-sm">Edit</a>
        <button type="button"
         class="btn btn-danger btn-sm delete-btn" 
         data-id="{{ $user->id }}">Delete</button>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.delete-btn').forEach(button => {
      button.addEventListener('click', function () {
        const userId = this.getAttribute('data-id');

        Swal.fire({
          title: 'Are you sure?',
          text: "This action cannot be undone!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Yes, delete it!',
          cancelButtonText: 'Cancel'
        }).then((result) => {
          if (result.isConfirmed) {
            fetch(`/users/delete/${userId}`, {
              method: 'DELETE',
              headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
              }
            })
            .then(response => response.json())
            .then(data => {
              Swal.fire('Deleted!', data.success, 'success')
              .then(() => window.location.reload());
            })
            .catch(error => {
              Swal.fire('Error', 'Something went wrong!', 'error');
            });
          }
        });
      });
    });
  });
</script>

