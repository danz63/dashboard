<?php
class Database
{
    public $conn;
    public function __construct()
    {
        $this->conn = mysqli_connect(host, user, pass, dbname);
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
        }
    }

    /** 
     * returns All Data as a two-dimensional array
     */
    public function get($table = '')
    {
        $query = "SELECT * FROM $table";
        $exec_query = mysqli_query($this->conn, $query);
        $data = [];
        while ($row = mysqli_fetch_assoc($exec_query)) {
            $data[] = $row;
        }
        return $data;
    }

    /** 
     * Get Data By Column Name
     * if data is more than 1 it will be return two dimensional array, adn second array is associative array
     * if data just 1 it will be return one dimensional array as a associative array
     $table is a table name
     $col (Column) and $param (Parameters) for the filter condition   
     */
    public function getDataByCol($table = '', $col = '', $param = '')
    {
        $query = "SELECT * FROM $table WHERE $col='$param'";
        $exec_query = mysqli_query($this->conn, $query);
        $data = [];
        while ($row = mysqli_fetch_assoc($exec_query)) {
            $data[] = $row;
        }
        if (count($data) == 1) {
            $data = $data[0];
        }
        return $data;
    }

    public function insert($table, $data)
    {
        $columns = '';
        $values = '';
        foreach ($data as $c => $v) {
            $columns .= $c . ", ";
            $values .= "'" . $v . "', ";
        }
        $columns = rtrim($columns, ', ');
        $values = rtrim($values, ', ');
        $query = "INSERT INTO $table ($columns) VALUES ($values)";
        $exect = mysqli_query($this->conn, $query);
        if (!$exect) {
            return false;
        }
        return true;
    }
}
