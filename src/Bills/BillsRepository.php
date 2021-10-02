<?php

declare(strict_types=1);

namespace Accounting\Bills;

use Accounting\Database\IDatabase;
use Accounting\Database\DatabaseException;

class BillsRepository implements IBillsRepository
{
    private IDatabase $db;

    public function __construct(IDatabase $db)
    {
        $this->db = $db;
    }

    public function insert(BillsDto $dto): int
    {
        $sql = "INSERT INTO `Bills` (`tran_date`, `due_date`, `description`, `reference`, `total`, `status`, `supplier_id`, `bill_payment_id`, `coa_id`)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->tranDate,
                $dto->dueDate,
                $dto->description,
                $dto->reference,
                $dto->total,
                $dto->status,
                $dto->supplierId,
                $dto->billPaymentId,
                $dto->coaId
            ]);

            return $this->db->lastInsertId();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function update(BillsDto $dto): int
    {
        $sql = "UPDATE `Bills` SET `tran_date` = ?, `due_date` = ?, `description` = ?, `reference` = ?, `total` = ?, `status` = ?, `supplier_id` = ?, `bill_payment_id` = ?, `coa_id` = ?
                WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->tranDate,
                $dto->dueDate,
                $dto->description,
                $dto->reference,
                $dto->total,
                $dto->status,
                $dto->supplierId,
                $dto->billPaymentId,
                $dto->coaId,
                $dto->id
            ]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function get(int $id): ?BillsDto
    {
        $sql = "SELECT `id`, `tran_date`, `due_date`, `description`, `reference`, `total`, `status`, `supplier_id`, `bill_payment_id`, `coa_id`
                FROM `Bills` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);
            $row = $result->fetchAll();

            return (!empty($row)) ? new BillsDto($row[0]) : null;
        } catch (DatabaseException $exception) {
            return null;
        }
    }

    public function getAll(): array
    {
        $sql = "SELECT `id`, `tran_date`, `due_date`, `description`, `reference`, `total`, `status`, `supplier_id`, `bill_payment_id`, `coa_id`
                FROM `Bills`";

        try {
            $result = $this->db->prepare($sql);
            $result->execute();
            $rows = $result->fetchAll();

            $result = [];
            foreach ($rows as $row) {
                $result[] = new BillsDto($row);
            }

            return $result;
        } catch (DatabaseException $exception) {
            return [];
        }
    }

    public function delete(int $id): int
    {
        $sql = "DELETE FROM `Bills` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }
}