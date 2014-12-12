<?php

class Application_Model_Categories
{
    private $_dbTable;

    public function __construct(){
        $this->_dbTable = new Application_Model_DbTable_Categories();
    }

    public function createCategories($array){
        $this->_dbTable->insert($array);
    }

    public function updateCategories($array, $id){
        $this->_dbTable->update($array, "id = $id");
    }

    public function deleteCategories($array){
        $this->_dbTable->insert($array);
    }

    function getCategoriesMatching($keywords)
    {
        $select = $this->_dbTable->select()
                                 ->where('Cat_name LIKE ?', "%$keywords%")
                                 ->order('name');
        $result = $this->_dbTable->fetchAll($select);
        return $result;
    }

    function showAllCategories($name = null) {
        $select = $this->_dbTable->select()->where('Active = ?', '1');
        $result = $this->_dbTable->fetchAll($select);
        return $result;
    }

}

