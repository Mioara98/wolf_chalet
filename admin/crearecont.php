<?php
$conn = new mysqli("localhost", "root", "", "wolf_chalet");

if ($conn->connect_error) {
    die("Eroare la conectare: " . $conn->connect_error);
}

$username = 'administrator';
$password = password_hash('Cisco123', PASSWORD_DEFAULT);

$sql = "INSERT INTO admins (username, password) VALUES ('$username', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "Admin creat cu succes!";
} else {
    echo " Eroare: " . $conn->error;
}

$conn->close();
?>
