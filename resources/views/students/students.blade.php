@extends('layouts.app')

@section('content')
    <h1>Students Page</h1>
    <!-- <p>{{ $name }} </p>
    <p>{{ $grade }} </p>
    <ul>
        @foreach ($address as $add)
            <li>{{ $add }}</li>
        @endforeach
    </ul> -->
    <x-alert type="danger" message="Announcement"/>
   
    <a href="{{ route('index') }}">Go to index</a>
@endsection
