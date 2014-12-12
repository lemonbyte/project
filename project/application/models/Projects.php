<?php

class Application_Model_Projects
{
    private $_dbTable;

    public function __construct(){
        $this->_dbTable = new Application_Model_DbTable_Projects();
    }

    public function createProjects($array){
        $this->_dbTable->insert($array);
    }

    public function updateProjects($array, $id){
        $this->_dbTable->update($array, "id = $id");
    }

    public function deleteProjects($array){
        $this->_dbTable->insert($array);
    }

    function showAllProjects($name = null) {
        $select = $this->_dbTable->select()->where('active = ?', '1');
        $result = $this->_dbTable->fetchAll($select);
        return $result;
    }

    function countProjects($name = null) {
        $select = $this->_dbTable->select()->where('open = ?', '0');
        $result = $this->_dbTable->fetchAll($select);
        return $result;
    }

}

