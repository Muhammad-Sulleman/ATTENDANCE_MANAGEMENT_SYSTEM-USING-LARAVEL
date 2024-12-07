@include("./partials/header");

<div class="student_container">
    <h2>Your Attendance</h2>
    <table border="1">
        <tr>
            <th>Class ID</th>
            <th>Total Sessions</th>
            <th>Attended</th>
            <th>Attendance (%)</th>
        </tr>
        @forelse ($attendanceRecords as $record)
        @php
        $attendancePercentage = 0;
        // Avoid division by zero
        if ($record->total_sessions > 0) {
        $attendancePercentage = ($record->attended / $record->total_sessions) * 100;
        }
        $color = $attendancePercentage < 75 ? 'red' : ($attendancePercentage < 85 ? 'yellow' : 'green' );
            @endphp
            <tr>
            <td>{{ $record->classid }}</td>
            <td>{{ $record->total_sessions }}</td>
            <td>{{ $record->attended }}</td>
            <td style="color: {{ $color }}">{{ number_format($attendancePercentage, 2) }}%</td>
            </tr>
            @empty
            <tr>
                <td colspan="4">No attendance records found for this student.</td>
            </tr>
            @endforelse
    </table>
</div>

@include("./partials/footer");