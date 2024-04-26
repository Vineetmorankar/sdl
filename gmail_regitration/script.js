function validateForm() {
  // Get form inputs
  const name = document.getElementById('name').value.trim();
  const email = document.getElementById('email').value.trim();
  const password = document.getElementById('password').value;
  const confirmPassword = document.getElementById('confirmPassword').value;

  let isValid = true;

  // Reset previous error messages
  document.getElementById('nameError').innerText = '';
  document.getElementById('emailError').innerText = '';
  document.getElementById('passwordError').innerText = '';
  document.getElementById('confirmPasswordError').innerText = '';

  // Name validation
  if (name === '') {
    document.getElementById('nameError').innerText = 'Name is required';
    isValid = false;
  }

  // Email validation
  const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (!emailPattern.test(email)) {
    document.getElementById('emailError').innerText = 'Invalid email format';
    isValid = false;
  }

  // Password validation
  if (password.length < 6) {
    document.getElementById('passwordError').innerText = 'Password must be at least 6 characters';
    isValid = false;
  }

  // Confirm password validation
  if (confirmPassword !== password) {
    document.getElementById('confirmPasswordError').innerText = 'Passwords do not match';
    isValid = false;
  }

  // Display alert if form is not valid
  if (!isValid) {
    alert('Please correct the errors in the form.');
  }

  return isValid;
}
