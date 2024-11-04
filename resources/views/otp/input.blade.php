<!DOCTYPE html>
<html>
<head>
    <title>Enter OTP</title>
</head>
<body>
    <h1>Enter OTP</h1>

    @if(session('error'))
        <p>{{ session('error') }}</p>
    @endif

    <form action="{{ route('verify.otp') }}" method="POST">
        @csrf
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        
        <label for="otp">OTP:</label>
        <input type="text" name="otp" required>

        <button type="submit">Verify OTP</button>
    </form>
</body>
</html>
