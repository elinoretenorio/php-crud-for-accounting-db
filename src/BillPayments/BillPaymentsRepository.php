<?php

declare(strict_types=1);

namespace Accounting\BillPayments;

use Accounting\Database\IDatabase;
use Accounting\Database\DatabaseException;

class BillPaymentsRepository implements IBillPaymentsRepository
{
    private IDatabase $db;

    public function __construct(IDatabase $db)
    {
        $this->db = $db;
    }

    public function insert(BillPaymentsDto $dto): int
    {
        $sql = "INSERT INTO `Bill_Payments` (`tran_date`, `description`, `reference`, `total`, `coa_id`)
                VALUES (?, ?, ?, ?, ?)";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->tranDate,
                $dto->description,
                $dto->reference,
                $dto->total,
                $dto->coaId
            ]);

            return $this->db->lastInsertId();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function update(BillPaymentsDto $dto): int
    {
        $sql = "UPDATE `Bill_Payments` SET `tran_date` = ?, `description` = ?, `reference` = ?, `total` = ?, `coa_id` = ?
                WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->tranDate,
                $dto->description,
                $dto->reference,
                $dto->total,
                $dto->coaId,
                $dto->id
            ]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function get(int $id): ?BillPaymentsDto
    {
        $sql = "SELECT `id`, `tran_date`, `description`, `reference`, `total`, `coa_id`
                FROM `Bill_Payments` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);
            $row = $result->fetchAll();

            return (!empty($row)) ? new BillPaymentsDto($row[0]) : null;
        } catch (DatabaseException $exception) {
            return null;
        }
    }

    public function getAll(): array
    {
        $sql = "SELECT `id`, `tran_date`, `description`, `reference`, `total`, `coa_id`
                FROM `Bill_Payments`";

        try {
            $result = $this->db->prepare($sql);
            $result->execute();
            $rows = $result->fetchAll();

            $result = [];
            foreach ($rows as $row) {
                $result[] = new BillPaymentsDto($row);
            }

            return $result;
        } catch (DatabaseException $exception) {
            return [];
        }
    }

    public function delete(int $id): int
    {
        $sql = "DELETE FROM `Bill_Payments` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }
}