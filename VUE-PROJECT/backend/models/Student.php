<?php
class Student {
    private $conn;
    private $table_name = "students";

    public $id;
    public $name;
    public $email;
    public $course;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Create student
    public function create() {
        $query = "INSERT INTO " . $this->table_name . " SET name=:name, email=:email, course=:course";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':course', $this->course);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Get all students
    public function getAll() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Update student
    public function update() {
        $query = "UPDATE " . $this->table_name . " SET name=:name, email=:email, course=:course WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':course', $this->course);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Delete student
    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $this->id);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>
