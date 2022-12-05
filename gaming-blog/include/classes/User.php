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
// aSDSADAS   OR '1' = '1' --
    public function showAll() {
        $query = "SELECT * FROM '".$this->table."'";
    }

    public function store() {
        $query = sprintf(
            "INSERT INTO users (email, name, password, gender)
                    VALUES ('%s', '%s', '%s', '%s') ",
            DB::escape($this->email),
            DB::escape($this->name),
            DB::escape($this->password),
            DB::escape($this->gender));

        DB::getInstance()->runQuery($query);
    }

}