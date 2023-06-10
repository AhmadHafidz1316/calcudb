<?php
class Database {
    private $host;
    private $username;
    private $password;
    private $database;
    private $connection;
    
    public function __construct($host, $username, $password, $database) {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
    }
    

    public function connect() {
        $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);
        

        if ($this->connection->connect_error) {
            die("Koneksi database gagal: " . $this->connection->connect_error);
        }
    }
    
    
    public function insertData($assessment, $ats, $aas) {
        $query = "INSERT INTO tb_nilai (asesmen, ats, aas)
                  VALUES ('$assessment', '$ats', '$aas')";
        
        if ($this->connection->query($query) === true) {
            echo "Data berhasil disimpan.";
        } else {
            echo "Error: " . $query . "<br>" . $this->connection->error;
        }
    }
    

    public function close() {
        $this->connection->close();
    }
}

$host = "localhost";
$username = "root";
$password = "";
$database = "sekolah";

$db = new Database($host, $username, $password, $database);

$db->connect();