<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link rel="stylesheet" href="../css/login.css">
</head>
<body>
  <div class="login-container">
    <h2>Welcome</h2>
    <form id="login-form" action="{{ route('LoginUser') }}" method="POST">
      @csrf
      <input type="email" id="username" name="email" placeholder="Email" required>
      <input type="password" id="password" name="password" placeholder="Password" required>
      <button type="submit">Login</button>
    </form>
    <p>Don't have an account? <a href="{{ route('MyProfileSignUp') }}">Sign Up</a></p>
  </div>

  @if (session('success'))
    <script>
      alert('{{ session('success') }}');
    </script>
  @elseif (session('error'))
    <script>
      alert('{{ session('error') }}');
    </script>
  @endif
  <script src="../js/login-signup.js"></script>
</body>
</html>
