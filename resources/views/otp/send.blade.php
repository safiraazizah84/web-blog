<!DOCTYPE html>
<html>
<head>
    <title>Send OTP</title>
</head>
<body>
    <h1>Request OTP</h1>

    @if(session('message'))
        <p>{{ session('message') }}</p>
    @endif

    <form action="{{ route('send.otp') }}" method="POST">
        @csrf
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <button type="submit">Send OTP</button>
    </form>
</body>
</html>
