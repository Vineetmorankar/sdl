function validateForm() {
    let isValid = true;
  
    // Reset previous error messages
    document.getElementById('nameError').innerText = '';
    document.getElementById('emailError').innerText = '';
    document.getElementById('passwordError').innerText = '';
    document.getElementById('dobError').innerText = '';
  
    // Name validation
    const name = document.getElementById('name').value.trim();
    if (name === '') {
      document.getElementById('nameError').innerText = 'Name is required';
      isValid = false;
    }
  
    // Email validation
    const email = document.getElementById('email').value.trim();
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(email)) {
      document.getElementById('emailError').innerText = 'Invalid email format';
      isValid = false;
    }
  
    // Password validation
    const password = document.getElementById('password').value;
    if (password.length < 6) {
      document.getElementById('passwordError').innerText = 'Password must be at least 6 characters';
      isValid = false;
    }
  
    // Date of Birth validation
    const dob = document.getElementById('dob').value;
    if (!dob) {
      document.getElementById('dobError').innerText = 'Date of Birth is required';
      isValid = false;
    }
  
    return isValid;
  }
  