<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign up</title>
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="signup.css">
</head>

<body>
  <div class="wrapper">
    <form action="signAdd.php" method="POST">
      <h1>Sign Up</h1>
      <div class="input-box">
        <input type="text" placeholder="First Name" name="f_name" required>
        <i class='bx bx-user'></i>
      </div>
      <div class="input-box">
        <input type="text" placeholder="Last  Name" name="l_name" required>
        <i class='bx bx-user'></i>
      </div>
      <div class="input-box">
        <input type="email" placeholder="Email" name="email" required>
        <i class='bx bx-envelope'></i>
      </div>
      <div class="input-box">
        <input id="passwordInput" type="password" placeholder="Password" name="pass" required>
        <span class="toggle-icon" id="togglePassword">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-eye-slash-fill"
            viewBox="0 0 16 16" alt="Toggle visibility" id="eyeIcon">
            <path
              d="m10.79 12.912-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7 7 0 0 0 2.79-.588M5.21 3.088A7 7 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474z" />
            <path
              d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829zm4.95.708-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829zm3.171 6-12-12 .708-.708 12 12z" />
          </svg>
        </span>
      </div>
      <div class="input-box">
        <input id="passwordInput2" type="password" placeholder="Confirm Password" name="pass2" required>
        <span class="toggle-icon" id="togglePassword2">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-eye-slash-fill"
            viewBox="0 0 16 16" alt="Toggle visibility" id="eyeIcon">
            <path
              d="m10.79 12.912-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7 7 0 0 0 2.79-.588M5.21 3.088A7 7 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474z" />
            <path
              d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829zm4.95.708-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829zm3.171 6-12-12 .708-.708 12 12z" />
          </svg>
        </span>
      </div>

      <div class="popup-container" id="popup">
        <div class="popup-card">
          <p>Account added successfully!</p>
          <button id="close-btn">OK</button>
        </div>
      </div>

      <button id="trigger-btn">Add Account</button>
      <div class="loginBox">
        <p>Already have an account?</p>
        <a href="../login/login.php" class="login-text">Login</a>
      </div>
      <script src="script.js"></script>

    </form>

  </div>

</body>

</html>
<script>
  const passwordInput = document.getElementById('passwordInput');
  const passwordInput2 = document.getElementById('passwordInput2');
  const togglePassword = document.getElementById('togglePassword');
  const togglePassword2 = document.getElementById('togglePassword2');


  const eyeOpenSVG = `
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-eye-fill" viewBox="0 0 16 16" id="eyeIcon">
  <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
  <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/>
</svg>`;

  const eyeClosedSVG = `
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-eye-slash-fill" viewBox="0 0 16 16" id="eyeIcon">
  <path d="m10.79 12.912-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7 7 0 0 0 2.79-.588M5.21 3.088A7 7 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474z"/>
  <path d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829zm4.95.708-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829zm3.171 6-12-12 .708-.708 12 12z"/>
</svg>`;

  togglePassword.addEventListener('click', () => {
    const isPasswordHidden = passwordInput.type === 'password';
    passwordInput.type = isPasswordHidden ? 'text' : 'password';
    togglePassword.innerHTML = isPasswordHidden ? eyeOpenSVG : eyeClosedSVG;
  });

  togglePassword2.addEventListener('click', () => {
    const isPasswordHidden = passwordInput2.type === 'password';
    passwordInput2.type = isPasswordHidden ? 'text' : 'password';
    togglePassword2.innerHTML = isPasswordHidden ? eyeOpenSVG : eyeClosedSVG;
  });
</script>