<?php
require_once '../classes/DB.php';

class User {
    private string $email;
    private string $name;
    private string $password;
    private string $gender;

    public string $table = 'users';

    function __construct($email, $name, $password, $gender) {
        $this->$email = $email;
        $this->$name = $name;
        $this->$password = $password;
        $this->$gender = $gender;
    }

    public function showAll() {
        $query = "SELECT * FROM '".$this->table."'";
    }

    public function store() {
        $query = "INSERT INTO users (email, password, name, gender)
                    VALUES ('".$this->email."', '".$this->name."', '".$this->password."', '".$this->gender."') ";

        DB::getInstance()->runQuery($query);
    }

}