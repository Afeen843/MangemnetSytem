<?php


/**
 *
 * Class DB
 */
class DB
{
    /**
     * @var $_databaseHost
     */
    protected $_databaseHost;

    /**
     * @var $_databaseUser
     */
    protected $_databaseUser;
    protected $_databasePass;
    protected $_databaseName;
    protected $_dbConnection;
    protected $_connection = false;
    protected $result = array();
    var $totalRecord;
    var $limit;
    var $pages;



    /**
     * Main Consructor
     *
     * @param string $host
     * @param string $user
     * @param string $pass
     * @param string $databaseName
     */
    public function __construct(
        string $host = 'localhost',
        string $user = 'root',
        string $pass = '',
        string $databaseName = 'tekhqs'
    )
    {
        $this->limit = 2;
        $this->_databaseHost = $host;
        $this->_databaseUser = $user;
        $this->_databasePass = $pass;
        $this->_databaseName = $databaseName;

        /** @var $dbConnection */
        $_dbConnection = $this->_createConnection($this->_databaseHost, $this->_databaseUser, $this->_databasePass, $this->_databaseName);

    }

    /**
     * Connection creation
     *
     * @param $host
     * @param $user
     * @param $pass
     * @param $database
     * @return mysqli
     */
    public function _createConnection(
        $host,
        $user,
        $pass,
        $database
    )
    {


        if (!$this->_connection) {
            try {
                $connection = mysqli_connect($host, $user, $pass, $database);
                if ($connection) {
                    $this->_connection = $connection;
                }
            } catch (Exception $exception) {
                var_dump($exception->getMessage());
                $this->_connection = false;
            }
        }
        return $this->_connection;
    }


    public function delete(string $table, int $entityId = null): bool
    {
        if ($this->tableExists($table)) {
            $sql = "delete from $table where entity_id=$entityId";
            if ($this->_connection->query($sql)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }




    /**
     * Insert query
     *
     * @param $table
     * @param array $params
     * @return bool
     */
    public function save($table, $params = array()): bool
    {

        if ($this->tableExists($table)) {
            $table_columns = implode(', ', array_keys($params));
            $table_value = implode("', '", $params);
            $sql = "INSERT INTO $table ($table_columns) VALUES ('$table_value')";

            if ($this->_connection->query($sql)) {
                return true;
            } else {

                return false;
            }

        } else {
            return false;
        }
    }

    public function tableExists($table)
    {
        $sql = "SHOW TABLES FROM $this->_databaseName LIKE '$table'";
        $tableInDb = $this->_connection->query($sql);
        if ($tableInDb) {
            if ($tableInDb->num_rows == 1) {
                return true;
            }
        } else {
            array_push($this->result, " table does not exits in the database ");
            return false;
        }


    }

    public function update($table, $params = array(), int $id)
    {
        if ($this->tableExists($table)) {
            $args = array();
            foreach ($params as $key => $value) {
                $args[] = "$key = '$value'";
            }

            $sql = "UPDATE $table SET " . implode(', ', $args) . "WHERE entity_id=$id";
//            if ($where != null) {
//                $sql .= " WHERE $where";
//            }
            if ($this->_connection->query($sql)) {

                return true;
            } else {

                return false;
            }
        } else {
            return false;

        }


    }


    public function deleteold($table, $where = null)
    {
        if ($this->tableExists($table)) {
            $sql = "DELETE FROM $table";
            if ($where != null) {
                $sql .= " WHERE $where";
            }

            if ($this->_connection->query($sql)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }

    }

    public function select(string $table)
    {
        $sql = "SELECT * FROM $table";
        $result = $this->_connection->query($sql);
        if ($result) {
            return $result->fetch_all(MYSQLI_ASSOC);
        }
    }

    public function selectuser(string $table, int $entityId = null)
    {
        $sql = "SELECT * FROM $table where entity_id=$entityId";
        $result = $this->_connection->query($sql);
        if ($result) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return false;
        }

    }


    public function pagination(string $table, $offset)
    {
        $sql = "SELECT * FROM  $table  LIMIT $this->limit OFFSET $offset ";


        $result = $this->_connection->query($sql);
        if ($result) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return 0;
        }

    }


    public function setlimit($limit)
    {
        $this->limit = $limit;

    }

    public function totalpages()
    {

        $this->pages = ceil($this->totalRecord / $this->limit);


    }

    public function GetCount(string $table)
    {

        $sql = "SELECT * FROM $table";
        $result = $this->_connection->query($sql);
        $this->totalRecord = mysqli_num_rows($result);
        self::totalpages();


    }

}


?>