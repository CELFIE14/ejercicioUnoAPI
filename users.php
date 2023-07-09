<?php

require_once 'db.php';

// respuesta en formato JSON
function sendResponse($data)
{
    header('Content-Type: application/json');
    echo json_encode($data);
}

// Obtener todos los usuarios
if ($_SERVER['REQUEST_METHOD'] === 'GET' && !isset($_GET['id'])) {
    $db = new MyDB();
    $users = $db->getAllUsers();
    sendResponse($users);
}

// Obtener un usuario por ID
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $db = new MyDB();
    $user = $db->getUserById($id);
    if ($user) {
        sendResponse($user);
    } else {
        sendResponse(['message' => 'El usuario no existe']);
    }
}
