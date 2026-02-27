<!DOCTYPE html>
<html>
<head>
    <title>Admin Control</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>

<div class="background">

    <div class="window">
        <div class="window-header">
            <div class="left">
                ⚙ Admin control
            </div>
            <div class="right">
                <span class="btn">—</span>
                <span class="btn">□</span>
                <span class="btn">✕</span>
            </div>
        </div>

        <div class="window-body">
             @if(session('error'))
        <p style="color:red; text-align:center;">
            {{ session('error') }}
        </p>
    @endif

    <form method="POST" action="{{ route('admin.login') }}">
        @csrf
        
                <div class="form-group">
                    <label>Username:</label>
                    <input type="text" name="username" required>
                </div>

                <div class="form-group">
                    <label>Password:</label>
                    <input type="password" name="password" required>
                </div>

                <button type="submit" class="login-btn">
                    Login
                </button>
            </form>
        </div>

        <div class="window-footer"></div>
    </div>

</div>

</body>
</html>