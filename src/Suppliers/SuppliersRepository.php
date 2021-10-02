<?php

declare(strict_types=1);

namespace Accounting\Suppliers;

use Accounting\Database\IDatabase;
use Accounting\Database\DatabaseException;

class SuppliersRepository implements ISuppliersRepository
{
    private IDatabase $db;

    public function __construct(IDatabase $db)
    {
        $this->db = $db;
    }

    public function insert(SuppliersDto $dto): int
    {
        $sql = "INSERT INTO `Suppliers` (`name`, `contact_person`, `email`, `phone`, `fax`, `address`)
                VALUES (?, ?, ?, ?, ?, ?)";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->name,
                $dto->contactPerson,
                $dto->email,
                $dto->phone,
                $dto->fax,
                $dto->address
            ]);

            return $this->db->lastInsertId();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function update(SuppliersDto $dto): int
    {
        $sql = "UPDATE `Suppliers` SET `name` = ?, `contact_person` = ?, `email` = ?, `phone` = ?, `fax` = ?, `address` = ?
                WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->name,
                $dto->contactPerson,
                $dto->email,
                $dto->phone,
                $dto->fax,
                $dto->address,
                $dto->id
            ]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function get(int $id): ?SuppliersDto
    {
        $sql = "SELECT `id`, `name`, `contact_person`, `email`, `phone`, `fax`, `address`
                FROM `Suppliers` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);
            $row = $result->fetchAll();

            return (!empty($row)) ? new SuppliersDto($row[0]) : null;
        } catch (DatabaseException $exception) {
            return null;
        }
    }

    public function getAll(): array
    {
        $sql = "SELECT `id`, `name`, `contact_person`, `email`, `phone`, `fax`, `address`
                FROM `Suppliers`";

        try {
            $result = $this->db->prepare($sql);
            $result->execute();
            $rows = $result->fetchAll();

            $result = [];
            foreach ($rows as $row) {
                $result[] = new SuppliersDto($row);
            }

            return $result;
        } catch (DatabaseException $exception) {
            return [];
        }
    }

    public function delete(int $id): int
    {
        $sql = "DELETE FROM `Suppliers` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }
}