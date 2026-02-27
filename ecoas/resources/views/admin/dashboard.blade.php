<!DOCTYPE html>
<html>
<head>
    <title>Admin Console</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>
<body>

<div class="container">

    <!-- LEFT CONSOLE -->
    <div class="console">
        <div class="header">Console</div>
        <div class="body">

            @if(session('success'))
                <p class="success">{{ session('success') }}</p>
            @endif

            @if(session('error'))
                <p style="color:red;">{{ session('error') }}</p>
            @endif

            @if ($errors->any())
                <div class="console-error">
                    <p><strong>Validation Failed.</strong></p>
                    <p>- Name must be 5–20 characters</p>
                    <p>- Age must be greater than 20</p>
                    <p>- Address must be 10–40 characters</p>
                    <p>- Phone must be 9–12 digits and start with 08</p>
                </div>
            @endif

            <h4>Employee List:</h4>

            @if(isset($employees) && $employees->count())
                @foreach($employees as $employee)
                    <p>
                        {{ $employee->name }} |
                        {{ $employee->age }} |
                        {{ $employee->phone }} |
                        {{ $employee->address }}
                    </p>
                @endforeach
            @else
                <p>No employees found.</p>
            @endif

        </div>
    </div>

    <!-- RIGHT PANEL -->
    <div class="panel">
        <div class="header">Choose employee</div>

        <form method="POST" action="{{ route('dashboard.action') }}">
            @csrf

            <input type="hidden" name="mode" id="modeInput" value="add">

            <label>Name:</label>
            <input type="text" name="name">

            <label>Age:</label>
            <input type="number" name="age">

            <label>Phone:</label>
            <input type="text" name="phone">

            <label>Address:</label>
            <input type="text" name="address">

            <div class="buttons">
                <button type="button" class="mode-btn active" onclick="setMode('add', this)">Add</button>
                <button type="button" class="mode-btn" onclick="setMode('change', this)">Change</button>
                <button type="button" class="mode-btn" onclick="setMode('delete', this)">Delete</button>
              <button type="submit" class="confirm">CONFIRM</button>
            </div>
        </form>
        <div class="brand">
            LONDO BELL
        </div>
    </div>

</div>

<script>
function setMode(mode, element) {
    document.getElementById('modeInput').value = mode;

    // Remove active from all buttons
    document.querySelectorAll('.mode-btn').forEach(btn => {
        btn.classList.remove('active');
    });

    // Add active to clicked button
    element.classList.add('active');
}
</script>
</body>
</html>