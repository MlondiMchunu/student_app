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

    public function getName(){
        return $this->name;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setAge($age){
        $this->age = $age;
    }

    public function getAge(){
        return $this->age;
    }

    public function setMajor($major){
        $this->major = $major;
    }

    public function getMajor(){
        return $this->major;
    }
}
?>