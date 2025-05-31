<?php
header('Content-Type: application/json; charset=utf-8');

$conn = new mysqli("localhost","root","","wolf_chalet");
if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode([]);
    exit;
}

// 🔄 Preluăm toate câmpurile, inclusiv id
$res = $conn->query("
  SELECT 
    id,
    nume,
    email,
    telefon,
    persoane,
    checkin,
    checkout
  FROM rezervari
  ORDER BY checkin
");

$out = [];
while ($row = $res->fetch_assoc()) {
    $out[] = $row;
}
echo json_encode($out);
$conn->close();
