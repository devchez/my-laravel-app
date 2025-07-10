@extends('layouts.app')

@section('content')

@if(session('success'))
  <div class="alert alert-success">{{ session('success') }}</div>
@endif 

<h1>Welcome to Your Website</h1>
<p>Homepage</p>
<a href="{{ route('students.view') }}" 
class="btn btn-success">Add Students</a>

<table class="table">
  <thead>
    <tr>
      <th>#</th>
      <th>Name</th>
      <th>Type</th>
      <th>Created Date</th>
      
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($posts as $post)
    <tr>
      <th>{{ $post->id }}</th>
      <td>{{ $post->name }}</td>
      <td>{{ $post->type }}</td >
      <td>{{ \Carbon\Carbon::parse($post->created_at)->format('F d, Y, gA') }}</td>
      <td>
        <a href="{{ route('students.edit.form', $post->id) }}" 
        class="btn btn-warning">Edit</a>

        <form action="{{ route('students.delete', $post->id) }}" 
        method="POST" class="d-inline delete-form">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">
            Delete</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

@endsection

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- <script>
  document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.delete-form').forEach(function(form) {
      form.addEventListener('submit', function(e) {
        e.preventDefault();
        Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to undo this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Yes, delete it!',
          cancelButtonText: 'Cancel'
        }).then((result) => {
          if (result.isConfirmed) {
            form.submit();
          }
        });
      });
    });
  });
</script> -->

