<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification</title>
    <style>
        /* Tambahkan gaya CSS sesuai kebutuhan */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        a {
            text-decoration: none;
            color: #007BFF;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Hello, {{ $user }}</h1>
        <p>Thank you for registering. Please click the button below to verify your email address:</p>
        <a href="{{ $verificationUrl }}" style="display: inline-block; padding: 10px 15px; background-color: #007BFF; color: #fff; border-radius: 5px;">Verify Email Address</a>
        <p>If you did not create an account, no further action is required.</p>
    </div>
</body>
</html>
