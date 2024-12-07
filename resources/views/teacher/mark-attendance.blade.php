@include("./partials/header");
<div class="mark-attendance">
    <h3>Mark Attendance for Class ID: {{ $classid }}</h3>
    <form method="POST" action="{{ route('teacher.storeAttendance', ['classid' => $classid]) }}">
        @csrf
        <ul>
            @forelse($students as $student)
            <li>
                <label>
                    {{ $student->fullname }}
                    <input type="checkbox" name="attendance[]" value="{{ $student->id }}">
                </label>
            </li>
            @empty
            <li>No students found for this class.</li>
            @endforelse
        </ul>
        <button type="submit">Submit</button>
    </form>
</div>
@include("./partials/footer");