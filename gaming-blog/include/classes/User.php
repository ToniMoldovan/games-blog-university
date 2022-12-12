<?php
require_once '../classes/DB.php';

class User
{
    private $email;
    private $name;
    private $password;
    private $gender;

    public $table = 'users';

    function __construct($email, $name, $password, $gender)
    {
        $this->email = $email;
        $this->name = $name;
        $this->password = $password;
        $this->gender = $gender;
    }

    public static function getUserByEmail($email)
    {
        $query = "SELECT * FROM users WHERE email = ?";
        $result = null;

        $stmt = DB::getInstance()->prepareStatement($query);
        $stmt->bind_param('s', $email);

        if ($stmt->execute())
        {
            $data = $stmt->get_result();
            $result = $data->fetch_all(MYSQLI_ASSOC);

            if (count($result) != 1) {
                $_SESSION['login_email_error'] = 'This email ['.$email.'] doesn\'t exist. Please try again.';
                header("location:" . ROOT_PATH . 'index.php?page=login');
                return false;
            }
        }

        return $result;
    }

    public function selectAll()
    {
        $query = "SELECT * FROM '" . $this->table . "'";
    }

    public function emailExists($email)
    {

        $query = "SELECT * FROM users WHERE email = ?";

        $stmt = DB::getInstance()->prepareStatement($query);
        $stmt->bind_param('s', $email);

        if ($stmt->execute()) {
            $data = $stmt->get_result();
            $result = $data->fetch_all(MYSQLI_ASSOC);

            if (count($result) < 1) {
                //email doesn't exist yet
                return false;
            }
        }

        return true;
    }

    public function nameExists($name)
    {
        $query = "SELECT * FROM users WHERE name = ?";

        $stmt = DB::getInstance()->prepareStatement($query);
        $stmt->bind_param('s', $name);

        if ($stmt->execute()) {
            $data = $stmt->get_result();
            $result = $data->fetch_all(MYSQLI_ASSOC);

            if (count($result) < 1) {
                //name doesn't exist yet
                return false;
            }
        }

        return true;
    }

    public function store()
    {
        $query = "INSERT INTO users (email, name, password, gender) VALUES (?, ?, ?, ?);";

        $stmt = DB::getInstance()->prepareStatement($query);
        $stmt->bind_param('ssss', $this->email, $this->name, $this->password, $this->gender);

        if ($this->emailExists($this->email)) {
            //Email already exists
            //echo 'Email already exists';
            $_SESSION['register_message_error'] = 'Email already exists! Please choose another one.';
            header("location:" . ROOT_PATH . 'index.php?page=register');
        } elseif ($this->nameExists($this->name)) {
            //Email already exists
            //echo 'Name already exists';
            $_SESSION['register_message_error'] = 'This name already exists! Please choose another one.';
            header("location:" . ROOT_PATH . 'index.php?page=register');
        } else {
            if ($stmt->execute())
            {
                $_SESSION['register_message_success'] = 'Account created successfully!';
                header("location:" . ROOT_PATH . 'index.php?page=register');
            }
            else{
                echo 'err preapred statements: ' . print_r($stmt->error_list, 1);
            }
        }
    }

}