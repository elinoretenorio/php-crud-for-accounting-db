<?php

declare(strict_types=1);

namespace Accounting\ReceivedMoneys;

use Accounting\Database\IDatabase;
use Accounting\Database\DatabaseException;

class ReceivedMoneysRepository implements IReceivedMoneysRepository
{
    private IDatabase $db;

    public function __construct(IDatabase $db)
    {
        $this->db = $db;
    }

    public function insert(ReceivedMoneysDto $dto): int
    {
        $sql = "INSERT INTO `Received_Moneys` (`tran_date`, `description`, `reference`, `total`, `customer_id`, `coa_id`)
                VALUES (?, ?, ?, ?, ?, ?)";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->tranDate,
                $dto->description,
                $dto->reference,
                $dto->total,
                $dto->customerId,
                $dto->coaId
            ]);

            return $this->db->lastInsertId();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function update(ReceivedMoneysDto $dto): int
    {
        $sql = "UPDATE `Received_Moneys` SET `tran_date` = ?, `description` = ?, `reference` = ?, `total` = ?, `customer_id` = ?, `coa_id` = ?
                WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->tranDate,
                $dto->description,
                $dto->reference,
                $dto->total,
                $dto->customerId,
                $dto->coaId,
                $dto->id
            ]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function get(int $id): ?ReceivedMoneysDto
    {
        $sql = "SELECT `id`, `tran_date`, `description`, `reference`, `total`, `customer_id`, `coa_id`
                FROM `Received_Moneys` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);
            $row = $result->fetchAll();

            return (!empty($row)) ? new ReceivedMoneysDto($row[0]) : null;
        } catch (DatabaseException $exception) {
            return null;
        }
    }

    public function getAll(): array
    {
        $sql = "SELECT `id`, `tran_date`, `description`, `reference`, `total`, `customer_id`, `coa_id`
                FROM `Received_Moneys`";

        try {
            $result = $this->db->prepare($sql);
            $result->execute();
            $rows = $result->fetchAll();

            $result = [];
            foreach ($rows as $row) {
                $result[] = new ReceivedMoneysDto($row);
            }

            return $result;
        } catch (DatabaseException $exception) {
            return [];
        }
    }

    public function delete(int $id): int
    {
        $sql = "DELETE FROM `Received_Moneys` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }
}