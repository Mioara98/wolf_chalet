<?php
// public/fetch_rezervari.php
header('Content-Type: application/json');

$conn = new mysqli("localhost","root","","wolf_chalet");
if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode([]);
    exit;
}

$res = $conn->query("SELECT checkin, checkout FROM rezervari");
$out = [];
while ($row = $res->fetch_assoc()) {
    $out[] = $row;
}
echo json_encode($out);
$conn->close();
          
                     
                







        