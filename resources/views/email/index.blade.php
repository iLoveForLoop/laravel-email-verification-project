<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Your Email</title>
</head>

<body style="font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f7f7f7; color: #333;">
    <div style="width: 100%; max-width: 600px; margin: 0 auto; padding: 20px; background-color: #ffffff; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
        <h1 style="color: #333; font-size: 24px; margin-bottom: 20px;">Hi {{ $user->name }},</h1>
        <h1 style="color: #333; font-size: 24px; margin-bottom: 20px;">Verify Your Email</h1>
        <p style="font-size: 16px; line-height: 1.5; margin-bottom: 20px;">Click the button below to verify your email address:</p>
        <a href="{{ url(route('verify', ['id' => $user->remember_token])) }}" style="display: inline-block; background-color: #4CAF50; color: white; padding: 15px 25px; text-align: center; font-size: 18px; text-decoration: none; border-radius: 4px; margin-top: 20px;">Verify Email</a>
    </div>
</body>

</html>
