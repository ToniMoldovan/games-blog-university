<?php
require_once '../classes/DB.php';

class User {
    private  $email;
    private  $name;
    private  $password;
    private  $gender;

    public  $table = 'users';

    function __construct($email, $name, $password, $gender) {
        $this->email = $email;
        $this->name = $name;
        $this->password = $password;
        $this->gender = $gender;
    }

    public function showAll() {
        $query = "SELECT * FROM '".$this->table."'";
    }

    public function emailExists($email) {
        $query = sprintf("SELECT * FROM users WHERE email='%s'", DB::escape($email));
        $result = DB::getInstance()->runQuery($query, "SELECT");

        if (count($result) < 1) {
            //email doesn't exist yet
            return false;
        }

        return true;
    }

    public function nameExists($name) {
        $query = sprintf("SELECT * FROM users WHERE name='%s'", DB::escape($name));
        $result = DB::getInstance()->runQuery($query, "SELECT");

        if (count($result) < 1) {
            //name doesn't exist yet
            return false;
        }

        return true;
    }

    public function store() {
        $query = sprintf(
            "INSERT INTO users (email, name, password, gender)
                    VALUES ('%s', '%s', '%s', '%s');",
            DB::escape($this->email),
            DB::escape($this->name),
            DB::escape($this->password),
            DB::escape($this->gender));

        if ($this->emailExists($this->email)) {
            //Email already exists
            echo 'Email already exists';
        }
        elseif ($this->nameExists($this->name)) {
            //Email already exists
            echo 'Name already exists';
        }
        else
            DB::getInstance()->runQuery($query);
    }

}