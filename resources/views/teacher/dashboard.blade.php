@include("./partials/header");
</div class="container">
<h2>Your Attendance Sessions</h2>

<!-- Button to create a new session -->
<a href="{{ route('teacher.createSession') }}" class="btn btn-primary" >Create session</a>

<div class="available-sessions">
    <ul>
        @forelse($classes as $class)
        <li>
            Class ID: {{ $class->id }} <br>
            Start: {{ $class->starttime }} <br>
            End: {{ $class->endtime }} <br>
            <a href="{{ route('teacher.markAttendance', ['classid' => $class->id]) }}">Mark Attendance</a>
        </li>
        @empty
        <li>No classes found.</li>
        @endforelse
    </ul>
</div>@include("./partials/footer");