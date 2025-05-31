<?php
// public/submit_booking.php
header('Content-Type: application/json');

// 1. Conectează-te la DB „rezervari”
$conn = new mysqli("localhost","root","","wolf_chalet");
if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode(['success'=>false,'message'=>'Eroare conexiune DB']);
    exit;
}

// 2. Preia şi validează
$nume     = trim($_POST['nume']     ?? '');
$email    = trim($_POST['email']    ?? '');
$telefon  = trim($_POST['telefon']  ?? '');
$persoane = (int)($_POST['persoane'] ?? 0);
$checkin  = $_POST['checkin']       ?? '';
$checkout = $_POST['checkout']      ?? '';

if (!$nume||!$email||!$telefon||$persoane<1||!$checkin||!$checkout) {
    http_response_code(400);
    echo json_encode(['success'=>false,'message'=>'Toate câmpurile sunt obligatorii']);
    exit;
}

// 3. Inserează în tabela rezervari
$stmt = $conn->prepare("
    INSERT INTO rezervari
      (nume, email, telefon, persoane, checkin, checkout)
    VALUES (?,?,?,?,?,?)
");
$stmt->bind_param("sssiss",
    $nume, $email, $telefon, $persoane, $checkin, $checkout
);

if ($stmt->execute()) {
    echo json_encode(['success'=>true]);
} else {
    http_response_code(500);
    echo json_encode(['success'=>false,'message'=>'Nu am putut salva rezervarea']);
}

$stmt->close();
$conn->close();
