<?php
require_once(CORE."DB_instance.php");

class Product{
    private $table;
    private $db;
    
    public function __construct(){
        $this->db = DB_INS;
        $this->table = "products";
    }
    public function getAllItems(){
        return $this->db->Read($this->table);
    }
    public function getFilteredItems($condition){
        return $this->db->Read($this->table,$condition);
    }
    public function addItem($data){
        $columns = array_keys($data);
        $this->db->Create($this->table,$columns,$data);
    }
    public function deleteItem($condition){
        $this->db->Delete($this->table,$condition);
    }
}