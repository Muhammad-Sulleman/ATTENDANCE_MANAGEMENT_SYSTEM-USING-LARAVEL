@include("./partials/header");
<div class="container">
    <p>Create session</p>
    <form method="POST" action="{{ route('teacher.createSession') }}">
        @csrf
        <div>
            <label for="starttime">Start Time:</label>
            <input type="time" id="starttime" name="starttime" value="12:00" required>
        </div>

        <div>
            <label for="endtime">End Time:</label>
            <input type="time" id="endtime" name="endtime" value="12:00" required>
        </div>

        <div>
            <label for="credit_hours">Credit Hours:</label>
            <input type="number" id="credit_hours" name="credit_hours" value="1" required>
        </div>

        <button type="submit">Create Session</button>
    </form>
</div>
@include("./partials/footer");