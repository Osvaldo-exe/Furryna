const signupForm = document.getElementById('signup-form');
const profileContainer = document.getElementById('profile-container');

signupForm.addEventListener('submit', function (event) {
  const password = document.getElementById('password').value.trim();
  const confirmPassword = document.getElementById('confirm-password').value.trim();

  if (password !== confirmPassword) {
    alert('Passwords do not match!');
    event.preventDefault(); // Prevent form submission
  } else if (password.length < 6) {
    alert('Password must be at least 6 characters long.');
    event.preventDefault(); // Prevent form submission
  }
});
