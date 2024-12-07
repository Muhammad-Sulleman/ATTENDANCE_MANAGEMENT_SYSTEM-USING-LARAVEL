
<div class='container'>
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
        // Check for zero or empty total_sessions
        $attendancePercentage = 0;
        if($record->total_sessions > 0) {
        $attendancePercentage = ($record->attended / $record->total_sessions) * 100;
        }
        // Set color based on attendance percentage
        $color = $attendancePercentage < 75 ? 'red' : ($attendancePercentage < 85 ? 'yellow' : 'green' );
            @endphp
            <tr style="background-color: {{ $color }};">
            <td>{{ $record->classid }}</td>
            <td>{{ $record->total_sessions }}</td>
            <td>{{ $record->attended }}</td>
            <td>{{ number_format($attendancePercentage, 2) }}%</td>
            </tr>
            @empty
            <tr>
                <td colspan="4">No attendance records found for this student.</td>
            </tr>
            @endforelse
    </table>
</div>
@endsection