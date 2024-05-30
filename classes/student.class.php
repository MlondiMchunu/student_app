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

    //CRUD Operations
    public function create(){
        $stmt = $this->conn->prepare('INSERT INTO students (name, email, age, major) VALUES (?, ?, ?, ?)');
        $stmt->execute([$this->name, $this->email, $this->age, $this->major]);
    }

    public function read(){
        $stmt = $this->conn->prepare('SELECT * from student where id = ?');
        $stmt->execute([$this->id]);
        $student = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->name = $student['name'];
        $this->email = $student['email'];
        $this->age = $student['age'];
        $this->major = $student['major'];
    }

    public function update(){
        $stmt = $this->conn->prepare('UPDATE student SET name = ?, email = ?, age = ?, major = ? WHERE id = ?');
        $stmt->execute([$this->name, $this->email, $this->age, $this->major, $this->id]);
    }

    public function delete(){
        $stmt = $this->conn->prepare('DELETE FROM student WHERE id = ?');
        $stmt->execute([$this->id]);
    }

    //static method for listing all students
    public static function all(){
        $db = new MySQLDatabase();
        $stmt = $db->conn->prepare('SELECT * FROM student');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


}
?>