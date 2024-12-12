<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up - PetJoy</title>
  <link rel="stylesheet" href="../css/login.css">
</head>
<body>
  <div class="login-container">
    <h2>Create Your Account</h2>
    <form id="signup-form" action="{{ route('signUpData')}}" method="POST">
      @csrf
      <input type="text" id="username" name="name" placeholder="Username" required>
      <input type="email" id="email" name="email" placeholder="email" required>
      <input type="password" id="password" name="password" placeholder="Password" required>
      <input type="password" id="confirm-password" placeholder="Confirm Password" required>
      <button type="submit">Sign Up</button>
    </form>
    <p>Already have an account? <a href="{{ route('MyProfileLogin') }}">Log In</a></p>
  </div>
  <script src="../js/login-signup.js"></script>
</body>
</html>
