<?php
include 'Student.php';

header('Content-Type: application/json');

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        echo json_encode(Student::all());
        break;
    
    case 'POST':
        $data = json_decode(file_get_contents('php://input'), true);
        $student = new Student();
        $student->setName($data['name']);
        $student->setEmail($data['email']);
        $student->setAge($data['age']);
        $student->setMajor($data['major']);
        $student->create();
        echo json_encode(['message' => 'Student created successfully']);
        break;

    case 'PUT':
        $data = json_decode(file_get_contents('php://input'), true);
        $student = new Student($data['id']);
        $student->setName($data['name']);
        $student->setEmail($data['email']);
        $student->setAge($data['age']);
        $student->setMajor($data['major']);
        $student->update();
        echo json_encode(['message' => 'Student updated successfully']);
        break;

    case 'DELETE':
        $id = $_GET['id'];
        $student = new Student($id);
        $student->delete();
        echo json_encode(['message' => 'Student deleted successfully']);
        break;

    default:
        echo json_encode(['message' => 'Method not allowed']);
        break;
}
?>
