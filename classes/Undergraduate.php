<?php
include_once 'Student.php';
include_once 'Database.php';

class Undergraduate extends Student {
    private $conn;

    public function __construct($name, $age, $level) {
        parent::__construct($name, $age, $level);
        try {
            $database = new Database();
            $this->conn = $database->getConnection();
        } catch (DatabaseConnectionException $e) {
            echo $e->getMessage();
        }
    }

    public function getDetails() {
        return "Name: $this->name, Age: $this->age, Level: $this->level";
    }

    public function save() {
        try {
            $query = "INSERT INTO students (name, age, level) VALUES (:name, :age, :level)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':name', $this->name);
            $stmt->bindParam(':age', $this->age);
            $stmt->bindParam(':level', $this->level);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public static function getAll() {
        try {
            $database = new Database();
            $conn = $database->getConnection();
            $query = "SELECT * FROM students";
            $stmt = $conn->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (DatabaseConnectionException $e) {
            echo $e->getMessage();
            return [];
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return [];
        }
    }

    public static function getById($id) {
        try {
            $database = new Database();
            $conn = $database->getConnection();
            $query = "SELECT * FROM students WHERE id = :id";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (DatabaseConnectionException $e) {
            echo $e->getMessage();
            return null;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return null;
        }
    }

    public function update($id) {
        try {
            $query = "UPDATE students SET name = :name, age = :age, level = :level WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':name', $this->name);
            $stmt->bindParam(':age', $this->age);
            $stmt->bindParam(':level', $this->level);
            $stmt->bindParam(':id', $id);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function delete($id) {
        try {
            $query = "DELETE FROM students WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
}
?>
