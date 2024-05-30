<?
class MySQLDatabase extends Database{
    protected function connect(){
        $this->conn = new PDO('mysql:host=localhost;dbname=student_management','root','');
    }
}
?>