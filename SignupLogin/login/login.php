<?php
$rememberedUser = isset($_COOKIE['remember_user']) ? $_COOKIE['remember_user'] : '';
$rememberedPass = isset($_COOKIE['remember_pass']) ? $_COOKIE['remember_pass'] : '';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login Page</title>
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="login.css" />
</head>

<body>
  <div class="wrapper">
    <form method="POST" action="loginAdd.php">
      <h1>Login</h1>

      <div class="input-box input-box-text">
        <input type="text" name="Username" placeholder="Email"
          value="<?php echo htmlspecialchars($rememberedUser); ?>" required />
        <i class='bx bx-user'></i>
      </div>

      <div class="input-box input-box-pass">
        <input type="password" name="Password" id="passwordInput" placeholder="Password" value="<?php echo htmlspecialchars($rememberedPass); ?>" required />
        <span class="toggle-icon" id="togglePassword">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-eye-slash-fill" viewBox="0 0 16 16" alt="Toggle visibility" id="eyeIcon">
            <path d="m10.79 12.912-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7 7 0 0 0 2.79-.588M5.21 3.088A7 7 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474z" />
            <path d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829zm4.95.708-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829zm3.171 6-12-12 .708-.708 12 12z" />
          </svg>
        </span>

      </div>

      <div class="remember-forget">
        <label class="remember-forget-text">
          <input type="checkbox" name="rememberCB" class="rememberCB"
            <?php if ($rememberedUser && $rememberedPass) echo 'checked'; ?>> Remember me
        </label>
        <a href="../resetPassword/resetPassword.php" class="remember-forget-text">Forget Password</a>
      </div>

      <button type="submit" class="btn">Login</button>
    </form>
    <div class="signupBox">
      <p>Donot have an account?</p>
      <a href="../signup/signup.php" class="signup-text">Signup</a>
    </div>
  </div>

  <script>
    const passwordInput = document.getElementById('passwordInput');
    const togglePassword = document.getElementById('togglePassword');

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
  </script>
</body>

</html>