<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Email</title>
</head>

<body>
    <p>
        You've registered your account. <br>
        Please verify that this is your account to have an access to Planee<br>
        <a href="{{ url('/verify/') }}/{{$id}}'" role="button">Activate Account</a>
    </p>
</body>

</html>