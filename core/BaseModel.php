<?php

namespace Core;
use PDO;

abstract class BaseModel
{
    protected $table;
    protected $pk;
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function findAll()
    {
        $query = "SELECT * FROM {$this->table}";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll();
        $stmt->closeCursor();
        return $result;
    }

    public function find($request)
    {
        $query = "SELECT * FROM {$this->table} WHERE nome like :nome";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindValue(":nome", "%{$request}%");
        $stmt->execute();
        $result = $stmt->fetch();
        $stmt->closeCursor();
        return $result;
    }

    public function findByPk($id)
    {
        $query = "SELECT * FROM {$this->table} WHERE {$this->pk} = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        $result = $stmt->fetch();
        $stmt->closeCursor();
        return $result;
    }

    public function insert($data)
    {
        $fields = implode(",", array_keys($data));
        $values = ":" . implode(",:", array_keys($data));
        
        $query = "INSERT INTO {$this->table} ({$fields}) VALUES ({$values})";
        $stmt = $this->pdo->prepare($query);
        foreach($data as $key => $value)
            $stmt->bindValue(":{$key}", $value);
        $stmt->execute();
        $stmt->closeCursor();
        return $this->pdo->lastInsertId();
    }

    public function update($id, $data)
    {
        $set = null;
        foreach($data as $key => $value)
            $set .= $key . " = " . ":$key" . ", ";
        $set = substr($set, 0, -2);
        $query = "UPDATE {$this->table} SET $set WHERE {$this->pk} = :id";
        $stmt = $this->pdo->prepare($query);
        foreach($data as $key => $value)
            $stmt->bindValue(":{$key}", $value);
        $stmt->bindValue(":id", $id);
        $result = $stmt->execute();
        $stmt->closeCursor();
        return $result;
    }

    public function delete($id)
    {
        $query = "DELETE FROM {$this->table} WHERE $this->pk = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindValue(":id", $id);
        $result = $stmt->execute();
        $stmt->closeCursor();
        return $result;
    }

    
}