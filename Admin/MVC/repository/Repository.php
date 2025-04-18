<?php
include('system/database/ConnectDb.php');
class Repository 
{
    var $sql, $pdo, $statement;
    public  function  __construct()
    {
      $this->pdo = ConnectDb::getInstance()->getConnect();
    }
    private function execute($params = [])
    {
        $this->statement = $this->pdo->prepare($this->sql);
        $this->statement->execute($params);
        return $this->statement;
    }
    public function setquery($sql)
    {
        $this->sql = $sql;
        return $this;
    }
    // 1 row obj
    function loadrow($params = [])
    {
        try {
            return  $this->execute($params)->fetch(pdo::FETCH_OBJ);
        } catch (PDOException $e) {
            exit('error query: ' . $e->getMessage());
        }
    }
    function loadrows($params = [])
    {
        try {
            return  $this->execute($params)->fetchAll(pdo::FETCH_OBJ);
        } catch (PDOException $e) {
            exit('error query: ' . $e->getMessage());
        }
    }
    function save($params = [])
    {
        try {
            return  $this->execute($params);
        } catch (PDOException $e) {
            exit('error query: ' . $e->getMessage());
        }
    }
    function disconnect()
    {
        $this->pdo = null && $this->statement = null;
    }
}
