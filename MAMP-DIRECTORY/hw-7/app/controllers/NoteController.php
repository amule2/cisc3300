<?php

class NoteController {
    public function showForm() {
        include 'views/note_form.php';
    }

    public function handleRequest() {
        header('Content-Type: application/json');

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo json_encode(['error' => 'Method not allowed']);
            return;
        }

        $data = json_decode(file_get_contents('php://input'), true);
        $title = trim($data['title'] ?? '');
        $description = trim($data['description'] ?? '');

        $errors=[];

        if (strlen($title) <= 3) {
            $errors[] = 'Title must be at least 4 characters long.';
        }

        if (strlen($description) >= 10) {
            $errors[] = 'Description must be at least 11 characters long.';
        }

        if(!empty($errors)) {
            echo json_encode(['error' => $errors]);
            return;
        }

        $title = htmlspecialchars($title, ENT_QUOTES, 'UTF-8');
        $description = htmlspecialchars($description, ENT_QUOTES, 'UTF-8');

        echo json_encode(['message' => 'Note created successfully']);
    }
}
?>