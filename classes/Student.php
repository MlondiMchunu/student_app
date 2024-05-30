<?php
abstract class Student {
    protected $name;
    protected $age;
    protected $level;

    public function __construct($name, $age, $level) {
        $this->name = $name;
        $this->age = $age;
        $this->level = $level;
    }

    abstract public function getDetails();
    abstract public function save();
    abstract public static function getAll();
    abstract public static function getById($id);
    abstract public function update($id);
    abstract public function delete($id);
}
?>
