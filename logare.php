<?php
session_start();
if (
    $_SERVER['REQUEST_METHOD'] === 'POST' &&
    isset($_POST['username'])
) {
    require_once __DIR__ . '/admin/login.php';
    exit;  
}
?>
<!DOCTYPE html>
<html lang="ro">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Wolf Chalet</title>
  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet" />
  <style>
    body {
      font-family: 'Montserrat', sans-serif;
      background: url('assets/images/mountain-bg.jpg') no-repeat center center/cover;
    }
    .overlay {
      background-color: rgba(0, 0, 0, 0.6);
    }
  </style>
</head>
<body class="min-h-screen flex items-center justify-center">
  <div class="overlay absolute inset-0"></div>
  <div class="relative z-10 max-w-md mx-auto p-8 bg-white rounded-2xl shadow-2xl text-center">
    <h1 class="text-4xl font-bold text-gray-800 mb-4">Bine ai venit la Wolf Chalet</h1>
    <p class="text-gray-600 mb-8">Alege una din opțiuni pentru a continua:</p>
    <div class="space-y-4">
      <a href="admin/login.php" class="block w-full py-3 bg-gray-800 text-white rounded-lg hover:bg-gray-700 transition">Autentificare Admin</a>
      <a href="public/index.html" class="block w-full py-3 bg-white text-gray-800 border border-gray-300 rounded-lg hover:bg-gray-100 transition">Continuă ca vizitator</a>
    </div>
  </div>
</body>
</html>
