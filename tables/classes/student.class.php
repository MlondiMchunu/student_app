<?
class Student extends MySQLDatabase{
    private $id;
    private $name;
    private $email;
    private $age;
    private $major;

    public function __construct($id = null){
        parent::__construct();

        if($id){
            $this->id = $id;
            $this->read();
        }
    }

    //Encapsulation: Setters and Getters

    public function setName($name){
        $this->name = $name;
    }
}
?>