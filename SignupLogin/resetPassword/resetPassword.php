<?php
$rememberedUser = isset($_COOKIE['remember_user']) ? $_COOKIE['remember_user'] : '';
$rememberedPass = isset($_COOKIE['remember_pass']) ? $_COOKIE['remember_pass'] : '';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Reset Password</title>
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="resetPassword.css" />
</head>

<body>
  <div class="wrapper">
    <form method="POST" action="updatePassword.php">
      <h1>Reset Password</h1>

      <div class="input-box input-box-text">
        <input type="text" name="Username" placeholder="Email"
          value="<?php echo htmlspecialchars($rememberedUser); ?>" required />
        <i class='bx bx-user'></i>
      </div>

      <div class="input-box input-box-pass">
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
      <div class="input-box input-box-pass">
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

      <button type="submit" class="btn">Reset</button>
    </form>
    <div class="signupBox">
      <p>Donot have an account?</p>
      <a href="../signup/signup.php" class="signup-text">Signup</a>
    </div>
  </div>

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
</body>

</html>