<?php
session_start();

// 
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

// Conectare la baza de date
$conn = new mysqli("localhost", "root", "", "wolf_chalet");
if ($conn->connect_error) {
    die("Conexiune eșuată: " . $conn->connect_error);
}

// Obține rezervările din baza de date
$sql = "SELECT * FROM rezervari ORDER BY checkin ASC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin - Wolf Chalet</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Rezervări Wolf Chalet</h2>
        <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>

    <?php if ($result->num_rows > 0): ?>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nume</th>
                        <th>Email</th>
                        <th>Telefon</th>
                        <th>Persoane</th>
                        <th>Check-in</th>
                        <th>Check-out</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= $row["id"] ?></td>
                            <td><?= htmlspecialchars($row["nume"]) ?></td>
                            <td><?= htmlspecialchars($row["email"]) ?></td>
                            <td><?= htmlspecialchars($row["telefon"]) ?></td>
                            <td><?= $row["persoane"] ?></td>
                            <td><?= $row["checkin"] ?></td>
                            <td><?= $row["checkout"] ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <div class="alert alert-info">Momentan nu există rezervări.</div>
    <?php endif; ?>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
