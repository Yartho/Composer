<?php
/**
 * Created by PhpStorm.
 * User: etudiant
 * Date: 28/03/2019
 * Time: 09:09
 */

namespace Model;


interface Crudinterface
{
    public function create (array $fieldValues ): int ;

    public static function read (int $id) ;

    public static function findAll (): array ;

    public function update ( int $id, array $fieldValues): bool;

    public function delete ( int $id): bool;

}