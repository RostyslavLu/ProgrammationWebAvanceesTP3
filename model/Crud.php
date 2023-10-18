<?php

abstract class Crud extends PDO {
    public function __construct() {
        parent::__construct('mysql:host=localhost;dbname=location_voitures;port=3306;charset=utf8', 'root', '');
    }

    public function select( $field = 'id', $order = null) {

        $sql = "SELECT * FROM $this->table ORDER BY $field $order";
        $stmt = $this->query($sql);
        return $stmt->fetchAll();
    }

    public function selectInnerJoin($selectFields, $table, $joinTable, $joinCondition) {
        $sql = "SELECT $selectFields
        FROM $table
        INNER JOIN $joinTable ON $joinCondition";

        $stmt = $this->query($sql);
        $results = $stmt->fetchAll();
        return $results;
    }

    public function selectId($value, $field ='id', $url = 'client-index') {

        $sql = "SELECT * FROM $this->table WHERE $this->primaryKey = :$this->primaryKey";
        $stmt = $this->prepare($sql);
        $stmt->bindValue(":$this->primaryKey", $value);
        $stmt->execute();
        $count = $stmt->rowCount();
        if ($count == 1) {
            return $stmt->fetch();
        } else {
            header("location:../../home/error");
            exit;
        }

    }
    public function insert($data) {
        
        $data_keys = array_fill_keys($this->fillable, '');
        
        $data = array_intersect_key($data, $data_keys);
        
        $fieldName = implode(', ', array_keys($data));
        $fieldValue = ":".implode(', :', array_keys($data));
        
        $sql = "INSERT INTO $this->table ($fieldName) VALUES ($fieldValue)";
        
        $stmt = $this->prepare($sql);
        
        foreach($data as $key =>$value){
            $stmt->bindValue(":$key", $value);
        }
        
        $stmt->execute();
        return $this->lastInsertId();
    }
    public function update($data){
        $data_keys = array_fill_keys($this->fillable, '');
        $data = array_intersect_key($data, $data_keys);
        $fieldName = null;

        foreach ($data as $key => $value) {
            $fieldName.= "$key = :$key, ";
        };

        $fieldName = rtrim($fieldName, ', ');
        $sql = "UPDATE $this->table SET $fieldName WHERE $this->primaryKey = :$this->primaryKey";
        //return $sql;

        $stmt = $this->prepare($sql);
        foreach($data as $key=>$value){
            $stmt->bindValue(":$key", $value);
        }
        
        $stmt->execute();

        if ($stmt->execute()) {
            //header('Location: '.$_SERVER['HTTP_REFERER']);
            return true;
        } else {
            print_r($stmt->errorInfo());
        }

    }
    public function delete($value) {

        $sql = "DELETE FROM $this->table WHERE $this->primaryKey = :$this->primaryKey";
        $stmt = $this->prepare($sql);

        $stmt->bindValue(":$this->primaryKey", $value);
        
        if ($stmt->execute()) {
            return true;
        } else {
            print_r($stmt->errorInfo());
        }
    }
}