@extends('layouts.app')

@section('content')
<h1>Your Attendance</h1>
<ul>
    @foreach($attendance as $record)
    <li style="color: {{ $record->is_present ? 'green' : 'red' }};">

        Class: {{ $record->class_id }} - Attendance: {{ $record->is_present ? 'Present' : 'Absent' }}
    </li>
    @endforeach
</ul>
@endsection