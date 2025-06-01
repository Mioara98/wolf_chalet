<?php
session_start();
$conn = new mysqli("localhost", "root", "", "wolf_chalet");

if ($conn->connect_error) {
    die("Conexiune eșuată: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    $stmt = $conn->prepare("SELECT * FROM admins WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $rez = $stmt->get_result();

    if ($rez->num_rows === 1) {
        $row = $rez->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['admin'] = $row['username'];
            header("Location: index.html");
            exit();
        } else {
            $error = "Parolă greșită.";
        }
    } else {
        $error = "Utilizatorul nu există.";
    }
}
?>
<!DOCTYPE html>
<html lang="ro">
<head>
  <meta charset="UTF-8">
  <title>Admin Login</title>
  <link rel="stylesheet" href="style.css"> <!-- ← CORESPUNDE STRUCTURII TALE -->
</head>
<body class="login-page">

<div class="login-container">
  <h2>Login Admin</h2>

  <form method="post" action="">
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Parolă" required>
    <button type="submit">Autentificare</button>
  </form>

</div>

</body>
</html>
