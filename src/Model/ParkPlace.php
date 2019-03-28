<?php
namespace Model;


use Database\DBConnection;

class ParkPlace implements CrudInterface
{
    private $id;
    private $type = 'normal';
    private $number;
    private $occupied = false;

    public function create(array $fieldValues): int
    {
        if ($this->id) {
            $this->update($this->id, $fieldValues);
            return $this->id;
        }
        $connection = DBConnection::getConnection();
        $stmt = $connection->prepare('
          INSERT INTO parkplace(type, number, occupied)
          VALUE (:type, :number, :occupied)
        ');

        foreach (['type', 'number', 'occupied'] as $placeholder) {
            if (!isset($fieldValues[$placeholder])) {
                $stmt->bindParam($placeholder, $this->{$placeholder});
                continue;
            }
            $stmt->bindParam($placeholder, $fieldValues[$placeholder]);
        }
        if (!$stmt->execute()) {
            throw new \LogicException($stmt->errorInfo()[2]);
        }
        return $connection->lastInsertId();
    }

    public static function read(int $id)
    {
        $connection = DBConnection::getConnection();

        $stmt = $connection->prepare('SELECT * FROM parkplace WHERE id = :id');
        $stmt->bindParam('id', $id);

        if (!$stmt->execute()) {
            throw new \LogicException($stmt->errorInfo()[2]);
        }
        return $stmt->fetch(\PDO::FETCH_CLASS, static::class);
    }

    /**
     * @return array
     * @throws \LogicException In case of execution failure
     */
    public static function findAll(): array
    {
//        Get the connection to the database
        $connection = DBConnection::getConnection();
//        create a statement
        $stmt = $connection->prepare('SELECT * FROM parkplace');
//        execute and store the result in an array
        if (!$stmt->execute()) {
            throw new \LogicException($stmt->errorInfo()[2]);
        }
//        return the array
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
     * @return ParkPlace
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return ParkPlace
     */
    public function setType(string $type): ParkPlace
    {
        $this->type = $type;
        return $this;
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
     * @return ParkPlace
     */
    public function setNumber($number)
    {
        $this->number = $number;
        return $this;
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
     * @return ParkPlace
     */
    public function setOccupied(bool $occupied): ParkPlace
    {
        $this->occupied = $occupied;
        return $this;
    }

}
