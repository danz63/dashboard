<?php
class Database
{
    public $conn;
    public function __construct()
    {
        $this->conn = mysqli_connect(HOST, USER, PASS, DBNAME);
        if (mysqli_connect_errno()) {
            die("Failed to connect to MySQL : " . mysqli_connect_error());
        }
    }

    /** 
     * fungsi untuk mengambil seluruh data dari table tertentu dalam database
     * @param string nama dari table
     * @return array dua dimensi
     */
    public function get($table = '')
    {
        $query = "SELECT * FROM $table";
        $exect = mysqli_query($this->conn, $query);
        if (!$exect) {
            die("Error Description : " . mysqli_error($this->conn));
        }
        $data = [];
        while ($row = mysqli_fetch_assoc($exect)) {
            $data[] = $row;
        }
        return $data;
    }

    /** 
     * Fungsi untuk mengambil seluruh data dengan clause tertentu
     * @param table string nama table
     * @param where array asosiatif
     * @param operator bool|string operator logika dalam query mysql
     * @return array dua dimensi jika data lebih dari 1, dan array asosiatif jika hanya terdapat 1 record data yang dihasilkan query
     */
    public function getWhere($table = '', $where = [], $operator = false)
    {
        $query = "SELECT * FROM $table ";
        if ($operator) {
            $query .= "WHERE ";
            foreach ($where as $k => $v) {
                $query .= "$k='$v' $operator ";
            }
            $query = trim(rtrim(trim($query), $operator));
        } else {
            $query .= "WHERE ";
            foreach ($where as $k => $v) {
                $query .= "$k='$v'";
                break;
            }
        }
        $execQuery = mysqli_query($this->conn, $query);
        if (!$execQuery) {
            die("Error description: " . mysqli_error($this->conn));
        }
        $data = [];
        while ($row = mysqli_fetch_assoc($execQuery)) {
            $data[] = $row;
        }
        if (count($data) == 1) {
            $data = $data[0];
        }
        return $data;
    }

    /** 
     * Fungsi untuk menambahkan data kedalam table tertentu
     * @param table string nama table
     * @param data array asosiatif
     * @return boolean, true jika query berhasil
     */
    public function insert($table = '', $data = [])
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
            die("Error Description : " . mysqli_error($this->conn));
        }
        return true;
    }
}
