<?php
require_once 'config.php';

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

    /**
     * @param $query
     * @param $type | SELECT, INSERT, UPDATE, DELETE
     * @return void
     */
    public function runQuery($query, $type) {
        //Check for query type first
        // and then switch over and return
        // correct type
    }

    /*! This is a test method ! */
    public function showTables() {
        $result = $this->connection->query("SELECT * FROM test");
        foreach (mysqli_fetch_array($result) as $obj => $key) {
            echo $key . '<br>';
        }
    }
}
