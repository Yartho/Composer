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


    $connection = DBConnection::getConnection();
    $stmt = $connection->prepare(
        'INSERT INTO parkplace SET type = :type, number = :number, occupied= :occupied');

    foreach (['type', 'number', 'occupied'] as $placeholder){

        if (!isset($fieldValues[$placeholder])){
            $stmt->bindParam($placeholder,$fieldValues[$placeholder]);
        }
        $stmt ->bindParam($placeholder, $fieldValues[$placeholder]);
    }
    if(!$stmt->execute()){
        throw new \LogicException($stmt->errorInfo()[2]);
    }

    return $connection->lastInsertId();


}

public static function read(int $id)
{
    $connection = DBConnection::getConnection();

    $stmt =$connection ->prepare('SELECT * FROM parkplace where id = :id');
    $stmt->bindParam( 'id', $id);

    if (! $stmt ->execute()){
        throw new \LogicException($stmt->errorInfo()[2]);
    }

    return $stmt->fetch(\PDO::FETCH_CLASS, static::class);


}

public static function findAll(): array
{
    $connection = DBConnection::getConnection();

    $stmt =$connection ->prepare('SELECT * FROM parkplace');

    if (! $stmt ->execute()){
        throw new \LogicException($stmt->errorInfo()[2]);
    }

    return $stmt->fetchAll(\PDO::FETCH_CLASS, static::class);


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