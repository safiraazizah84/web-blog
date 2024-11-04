<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Post Has Been Rejected</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        h1 {
            color: #e83737;
            font-size: 2.5em;
            margin-bottom: 10px;
        }
        p {
            font-size: 1.2em;
            line-height: 1.6;
        }
        .post-title {
            font-weight: bold;
            color: #333;
            font-size: 1.4em;
        }
        .message {
            font-size: 1.1em;
            margin: 20px 0;
        }
        .cta-button {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 25px;
            background-color: #e83737;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 1.1em;
            transition: background-color 0.3s ease;
        }
        .cta-button:hover {
            background-color: #e83737;
        }
        .footer {
            margin-top: 40px;
            font-size: 0.9em;
            color: #777;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>😓 We're Sorry!</h1>
        <p class="message">Your post titled <span class="post-title">"{{ $post->title }}"</span> has been rejected!</p>
        <p>Thank you for your submission. We encourage you to keep trying!</p>
        
        <a href="{{ url('post_details', $post->id) }}" class="cta-button">View Your Post</a>

        <div class="footer">
            <p>If you have any questions, feel free to <a href="mailto:support@example.com">contact us</a>.</p>
            <p>&copy; {{ date('Y') }} Ocean Bliss Blog. All rights reserved.</p>
        </div>
    </div>

</body>
</html>



