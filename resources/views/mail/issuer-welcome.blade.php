<!DOCTYPE html>
<html>
<head>
  <title>Welcome</title>
</head>
<body>
<h1>Welcome {{ $user->name }}</h1>
  <p>Your account has been created successfully.</p>
  <p>Email: {{ $user->email }}</p>
  <p>Password: {{ $password }}</p>
  <p>Please log in and change your password as soon as possible.</p>
  <p></p>
</body>
</html>
