<?
class MySQLDatabase extends Database{
    protected function connect(){
        $this->conn = new PDO('mysql:host=localhost;dbname=student_management','root','');
        $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }
}
?>