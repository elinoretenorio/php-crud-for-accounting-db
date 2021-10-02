<?php

declare(strict_types=1);

namespace Accounting\Customers;

use Accounting\Database\IDatabase;
use Accounting\Database\DatabaseException;

class CustomersRepository implements ICustomersRepository
{
    private IDatabase $db;

    public function __construct(IDatabase $db)
    {
        $this->db = $db;
    }

    public function insert(CustomersDto $dto): int
    {
        $sql = "INSERT INTO `Customers` (`name`, `contact_person`, `email`, `phone`, `fax`, `address`)
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

    public function update(CustomersDto $dto): int
    {
        $sql = "UPDATE `Customers` SET `name` = ?, `contact_person` = ?, `email` = ?, `phone` = ?, `fax` = ?, `address` = ?
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

    public function get(int $id): ?CustomersDto
    {
        $sql = "SELECT `id`, `name`, `contact_person`, `email`, `phone`, `fax`, `address`
                FROM `Customers` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);
            $row = $result->fetchAll();

            return (!empty($row)) ? new CustomersDto($row[0]) : null;
        } catch (DatabaseException $exception) {
            return null;
        }
    }

    public function getAll(): array
    {
        $sql = "SELECT `id`, `name`, `contact_person`, `email`, `phone`, `fax`, `address`
                FROM `Customers`";

        try {
            $result = $this->db->prepare($sql);
            $result->execute();
            $rows = $result->fetchAll();

            $result = [];
            foreach ($rows as $row) {
                $result[] = new CustomersDto($row);
            }

            return $result;
        } catch (DatabaseException $exception) {
            return [];
        }
    }

    public function delete(int $id): int
    {
        $sql = "DELETE FROM `Customers` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }
}