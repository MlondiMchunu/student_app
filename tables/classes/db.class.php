<?
abstract class Database{
    protected $conn;

    public function __construct(){
        $this->connect();
    }

    abstract protected function connect();

    public function __destruct(){
        $this->conn = null;
    }
}
?>