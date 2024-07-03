<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST, GET, PUT, DELETE');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Content-Type, Authorization');

// Incluir archivos necesarios
include_once './config.php';
include_once './includes/Database.php';
include_once './models/Product.php';

// Obtener la ruta desde el parámetro 'url'
$url = isset($_GET['url']) ? rtrim($_GET['url'], '/') : '/';

// Dividir la URL en partes
$urlParts = explode('/', $url);

// Determinar el recurso y el ID (si es aplicable)
$resource = $urlParts[0];
$resourceId = isset($urlParts[1]) ? $urlParts[1] : null;

// Método para manejar la solicitud HTTP
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        // Lógica para obtener productos (READ)
        echo json_encode(['success'=>false,'message' => 'Metodo get']);
        break;
    case 'POST':
        // Lógica para crear un producto (CREATE)
        break;
    case 'PUT':
        // Lógica para actualizar un producto (UPDATE)
        break;
    case 'DELETE':
        // Lógica para eliminar un producto (DELETE)
        break;
    default:
        // Método no permitido
        http_response_code(405);
        echo json_encode(['success'=>false,'message' => 'Método no permitido']);
        break;
}