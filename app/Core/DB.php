<?php
$connectionInfos= [
    'servername' => DB_HOST,
    'username' => DB_USER,
    'password' => DB_PASS,
    'DB_name' => DB_NAME
];
class DB{
    private $conn;
    function __construct($connectionInfos){
        extract($info);
        try {
            $this->conn = new PDO("mysql:host=$servername;dbname=$DB_name",$username,$password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            
        } catch (PDOException $e) {
            $this->conn = NULL;
            echo "error message : $e";
        }
        
    }
    function Create($table,$columns,$data){
        $columnNames = implode(',', $columns);

        $placeholders = ':' . implode(',:', $columns);
        
        $query = "INSERT INTO $table ($columnNames) VALUES ($placeholders)";
        $statement = $this->conn->prepare($query);
        $statement->execute($data);
    }
    function Read($table,$condition=''){
        if(!$condition){
            $query = "SELECT * FROM $table";    
        }else{
            $query = "SELECT * FROM $table WHERE $condition";
        }
        $statement = $this->conn->prepare($query);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_OBJ);
        $result = $statement->FetchAll();
        return $result;
    }
    function Update($table,$column,$data,$condition){
        $setClause = implode(', ', array_map(function($column) {
            return "$column = :$column";
        }, $column));
        $query = "UPDATE $table SET $setClause WHERE $condition";
        $statement = $this->conn->prepare($query);
        $statement->execute($data);
        
    }
    function Delete($table,$condition){
        $query = "DELETE FROM $table WHERE $condition";
        $statement = $this->conn->prepare($query);
        $statement->execute();
        
        
    }
}