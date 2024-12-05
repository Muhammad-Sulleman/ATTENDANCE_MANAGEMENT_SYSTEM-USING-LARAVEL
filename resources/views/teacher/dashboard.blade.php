@extends('layouts.app')

@section('content')
<h1>Attendance Sessions</h1>
<ul>
    @foreach($classes as $class)
    <li>
        Class: {{ $class->id }} ({{ $class->start_time }} - {{ $class->end_time }})
        <a href="{{ route('attendance.mark', $class->id) }}">Mark Attendance</a>
    </li>
    @endforeach
</ul>
@endsection