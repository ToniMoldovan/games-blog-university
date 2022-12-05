<?php
// Make a singleton DB for all queries and DB handling

class DB {
    private static $instance = null;

    private $server = SERVER_IP;
    private $user = DB_USER;
    private $password = DB_PASS;
    private $database = DB_NAME;

    private $connection;

    private function __construct() {
        //Here goes DB connection etc
        $this->connection = new \mysqli($this->server, $this->user, $this->password, $this->database);

        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }

        //echo "Connected successfully";
    }

    //Prevent cloning
    private function __clone() { }

    public static function getInstance() {
        if (self::$instance == null)
            self::$instance = new DB();

        return self::$instance;
    }

    public static function escape($string) {
        return mysqli_real_escape_string(self::getInstance()->connection, $string);
    }

    /**
     * @param $query
     * @param $type | SELECT, INSERT, UPDATE, DELETE
     * @return void
     */
    public function runQuery($query) {
        if ($this->connection->query($query)) {
            echo 'Query executed successfully!';
        }
        else
            echo 'Error on query: ' . $this->connection->error;
    }

    /*! This is a test method ! */
    public function showTables() {
        $result = $this->connection->query("SELECT * FROM test");
        $result = $result->fetch_all(MYSQLI_ASSOC);

        foreach ($result as $row) {
            echo $row['test1'] . ' ' . $row['test2'] . '<br>';
        }
//        echo '<pre>';
//        var_dump($result);
//        echo '</pre>';
    }
}
