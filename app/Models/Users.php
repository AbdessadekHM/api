<?php
require_once(CORE."DB_instance.php");

class Users{
    private $table;
    private $db;
    
    public function __construct($table){
        $this->db = DB_INS;
        $this->table = $table;
    }
    public function getAllUsers(){
        return $this->db->Read($this->table);
    }
    public function getFilteredUsers($condition){
        return $this->db->Read($this->table,$condition);
    }
    public function addUser($data){
        $columns = array_keys($data);
        $this->db->Create($this->table,$columns,$data);
    }
    public function updateUser($data,$condition){
        $columns = array_keys($data);
        $this->db->Update($this->table,$columns,$data,$condition);
    }
    public function deleteUser($condition){
        $this->db->Delete($this->table,$condition);
    }
    public function getUserAttributes(){
        $columns = $this->db->getColumns($this->table);
        return $columns;
    }
}