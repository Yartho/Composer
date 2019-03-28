<?php

namespace Model;


use Database\DBConnection;

class ParkPlace implements Crudinterface
{
    private $id;
    private $type;
    private $number;
    private $occupied = false;


public function create(array $fieldValues): int
{
    // TODO: Implement create() method.
}

public static function read(int $id)
{
    // TODO: Implement read() method.
}

public static function findAll(): array
{
    $connection = DBConnection::getConnection();

    $stmt =$connection ->prepare('SELECT * FROM parkplace');

    if (! $stmt ->execute()){
        throw new \LogicException($stmt->errorInfo()[2]);
    }

    $results= $stmt->fetchAll();
    
}

public function update(int $id, array $fieldValues): bool
{
    // TODO: Implement update() method.
}

    public function delete(int $id): bool
{
    // TODO: Implement delete() method.
}

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param mixed $number
     */
    public function setNumber($number)
    {
        $this->number = $number;
    }

    /**
     * @return bool
     */
    public function isOccupied(): bool
    {
        return $this->occupied;
    }

    /**
     * @param bool $occupied
     */
    public function setOccupied(bool $occupied)
    {
        $this->occupied = $occupied;
    }



}