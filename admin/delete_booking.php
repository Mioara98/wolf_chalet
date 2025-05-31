<?php
header('Content-Type: application/json; charset=utf-8');

// 1) Conectare la DB
$conn = new mysqli('localhost', 'root', '', 'wolf_chalet');
if ($conn->connect_error) {
    http_response_code(500);
    exit(json_encode(['success' => false, 'message' => 'Eroare DB']));
}

// 2) Citește JSON-ul din corpul cererii
$input = json_decode(file_get_contents('php://input'), true);
$id = filter_var($input['id'] ?? 0, FILTER_VALIDATE_INT);

if (!$id) {
    http_response_code(400);
    exit(json_encode(['success' => false, 'message' => 'ID invalid']));
}

// 3) Șterge înregistrarea
$stmt = $conn->prepare("DELETE FROM rezervari WHERE id = ?");
$stmt->bind_param('i', $id);

if ($stmt->execute()) {
    if ($stmt->affected_rows > 0) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Rezervarea nu a fost găsită.']);
    }
} else {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Nu am putut șterge.']);
}

$stmt->close();
$conn->close();
?>
