<?php
session_start();

// Jika sudah login, langsung arahkan ke dashboard
if (isset($_SESSION['username'])) {
  header("Location: dashboard.php");
  exit();
}

// Variabel error
$error = "";

// Jika form dikirim
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $username = trim($_POST['username']);
  $password = trim($_POST['password']);

  // Contoh kredensial login
  if ($username === "Andra" && $password === "2409106017") {
    $_SESSION['username'] = $username;
    header("Location: dashboard.php");
    exit();
  } else {
    $error = "Username atau password salah!";
  }
}
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Login</title>
  <link rel="stylesheet" href="style.css">
  <script src="script.js" defer></script>
  <style>
    /* Hilangkan footer hitam */
    footer { display: none; }

    /* Header dengan tombol mode gelap di kanan */
    header {
      position: relative;
      background: linear-gradient(135deg, #63ab60, #4d8a4a);
      color: #fff;
      padding: 1.5rem 0;
      text-align: center;
    }
    #darkToggle {
      position: absolute;
      right: 1rem;
      top: 1rem;
      background: #fff;
      color: #2e5b3d;
      border-radius: 8px;
      padding: 0.4rem 0.8rem;
      cursor: pointer;
      font-weight: 600;
      border: none;
    }

    body.dark-mode #darkToggle {
      background: #25462f;
      color: #e6f2ea;
    }

    /* Kotak login */
    .login-container {
      max-width: 400px;
      margin: 3rem auto;
      background: #fff;
      border-radius: 12px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      padding: 2rem;
    }

    .login-container input {
      width: 100%;
      padding: 0.7rem;
      margin-bottom: 1rem;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 1rem;
    }

    body.dark-mode .login-container {
      background: #12201a;
      color: #e6f2ea;
    }

    body.dark-mode .login-container input {
      background: #0f1720;
      border-color: #3d7a4f;
      color: #e6f2ea;
    }
  </style>
</head>
<body>
  <header>
    <h1>Halaman Login</h1>
    <button id="darkToggle">Mode Gelap</button>
  </header>

  <main>
    <div class="login-container">
      <form method="POST" action="login.php">
        <h2 style="color:#63ab60;">Masuk ke Akun</h2>
        <?php if ($error): ?>
          <p style="color:red;"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" class="btn btn-primary" style="width:100%;">Login</button>
      </form>
    </div>
  </main>
</body>
</html>
