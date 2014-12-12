<?php

class Application_Model_Users
{
    private $_dbTable;

    public function __construct(){
        $this->_dbTable = new Application_Model_DbTable_Users();
    }

    public function createUser($array){
        $this->_dbTable->insert($array);
    }

    public function readUser($array){
        $this->_dbTable->select($array);
    }

    public function updateUser($array, $id){
        $this->_dbTable->update($array, "id = $id");
    }

    public function deleteUser($array){
        $this->_dbTable->insert($array);
    }

    public function findByEmail($email){
       $select = $this->_dbTable->select()->where('username = ?', $email);
       $result = $this->_dbTable->fetchRow($select);
       return $result;
    }

}

