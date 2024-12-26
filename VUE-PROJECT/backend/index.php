<?php
require_once 'config/Database.php';
require_once 'controllers/StudentController.php';

// Create database connection
$database = new Database();
$db = $database->getConnection();

// Instantiate the controller
$studentController = new StudentController($db);

// Set the header to JSON
header('Content-Type: application/json');

// Handle CRUD operations
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] == 'list') {
    // List students
    echo json_encode($studentController->getStudents());
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] == 'create') {
    // Create a student
    $data = $_POST;
    echo json_encode($studentController->createStudent($data));
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] == 'update') {
    // Update student
    $data = $_POST;
    echo json_encode($studentController->updateStudent($data));
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] == 'delete') {
    // Delete student
    $id = $_POST['id'];
    echo json_encode($studentController->deleteStudent($id));
}
?>
