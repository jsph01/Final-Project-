<?php
class Database
{

    private $dsn = "mysql:dbname=vh3384_test;host=localhost;port=3306";
    private $usr = 'vh3384_testuser';
    private $pwd = "Test1234!";
    private $host = "localhost";
    private $dbh = null;
    private $stmt = null;
    private $os = "LIN";

    public function __construct($args = null) {
       // echo "db constructor";
        $this->dbh = new PDO($this->dsn, $this->usr, $this->pwd);
    }

    public function execute($sql) {
        try {
            $this->stmt = $this->dbh->prepare($sql);
            //echo $sql;
            $retval = $this->stmt->execute(); //or die (implode(':', $this->stmt->errorInfo()));
            if (!($retval))
                return -1;

            if (substr(strtoupper($sql), 0, 1) != "I")
                return 1;

            $this->query("SELECT LAST_INSERT_ID()");
            $row = $this->fetch();
            return $row[0];
        } catch (PDOException $e) {
            echo "$sql failed reason: $e";
            return -2;
        }
    }
	public function query($sql) {
        try {
            $this->stmt = $this->dbh->prepare($sql);
            $this->stmt->execute();
            return $this->stmt;
        } catch (PDOException $e) {
            die('Query failed: ' . $e->getMessage());
        }
    }
	public function fetch() {
        try {
            return $this->stmt->fetch();
        } catch (PDOException $e) {
            die('Fetch failed: ' . $e->getMessage());
        }
    }
	public function close() {
        $this->dbh = null;
        //mysql_close( $dbh );
    }
}
?>