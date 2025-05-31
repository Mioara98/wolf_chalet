<?php
// update_booking.php
header('Content-Type: application/json; charset=utf-8');

$conn = new mysqli('localhost','root','','wolf_chalet');
if ($conn->connect_error) {
    http_response_code(500);
    exit(json_encode(['success'=>false,'message'=>'Eroare DB']));
}

// 1) Citește JSON din body
$input = json_decode(file_get_contents('php://input'), true);
$id       = filter_var($input['id'] ?? 0, FILTER_VALIDATE_INT);
$checkin  = trim($input['checkin']  ?? '');
$checkout = trim($input['checkout'] ?? '');

// 2) Validări
$errors = [];
if (!$id) {
    $errors[] = 'ID invalid.';
}
if (!$checkin || !$checkout) {
    $errors[] = 'Datele check-in și check-out sunt obligatorii.';
} elseif (strtotime($checkout) <= strtotime($checkin)) {
    $errors[] = 'Check-out trebuie să fie după check-in.';
}

if ($errors) {
    http_response_code(400);
    exit(json_encode(['success'=>false,'message'=>implode(' ', $errors)]));
}

// 3) UPDATE
$stmt = $conn->prepare("
  UPDATE rezervari
  SET checkin = ?, checkout = ?
  WHERE id = ?
");
$stmt->bind_param('ssi', $checkin, $checkout, $id);

if ($stmt->execute()) {
  echo json_encode([
  'success' => true,
  'id'      => $stmt->insert_id
]);

} else {
    http_response_code(500);
    echo json_encode(['success'=>false,'message'=>'Nu am putut actualiza rezervarea.']);
}

$stmt->close();
$conn->close();
