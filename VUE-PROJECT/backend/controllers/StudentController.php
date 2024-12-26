<?php
require_once 'models/Student.php';

class StudentController {
    private $db;
    private $student;

    public function __construct($db) {
        $this->db = $db;
        $this->student = new Student($db);
    }

    // Create new student
    public function createStudent($data) {
        $this->student->name = $data['name'];
        $this->student->email = $data['email'];
        $this->student->course = $data['course'];
        return $this->student->create();
    }

    // Get list of all students
    public function getStudents() {
        $stmt = $this->student->getAll();
        $students = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $students[] = $row;
        }
        return $students;
    }

    // Update student
    public function updateStudent($data) {
        $this->student->id = $data['id'];
        $this->student->name = $data['name'];
        $this->student->email = $data['email'];
        $this->student->course = $data['course'];
        return $this->student->update();
    }

    // Delete student
    public function deleteStudent($id) {
        $this->student->id = $id;
        return $this->student->delete();
    }
}
?>
