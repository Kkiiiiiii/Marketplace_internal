<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Page</title>
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
</head>
<style>
    .box{
        background-color: salmon;
        width: 55px;
        height: 55px;
     }
</style>
<body>
    <div class="login box">
        <label for="username">Username :</label>
        <input type="text" name="username" class="mb-3">
        <br>
        <label for="password">Password :</label>
        <input type="password" name="password">
    </div>
</body>
</html>
<script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.js') }}"></script>
