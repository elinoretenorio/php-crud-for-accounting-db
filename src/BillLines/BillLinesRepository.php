<?php

declare(strict_types=1);

namespace Accounting\BillLines;

use Accounting\Database\IDatabase;
use Accounting\Database\DatabaseException;

class BillLinesRepository implements IBillLinesRepository
{
    private IDatabase $db;

    public function __construct(IDatabase $db)
    {
        $this->db = $db;
    }

    public function insert(BillLinesDto $dto): int
    {
        $sql = "INSERT INTO `Bill_Lines` (`line_amount`, `bill_id`, `line_coa_id`)
                VALUES (?, ?, ?)";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->lineAmount,
                $dto->billId,
                $dto->lineCoaId
            ]);

            return $this->db->lastInsertId();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function update(BillLinesDto $dto): int
    {
        $sql = "UPDATE `Bill_Lines` SET `line_amount` = ?, `bill_id` = ?, `line_coa_id` = ?
                WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->lineAmount,
                $dto->billId,
                $dto->lineCoaId,
                $dto->id
            ]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function get(int $id): ?BillLinesDto
    {
        $sql = "SELECT `id`, `line_amount`, `bill_id`, `line_coa_id`
                FROM `Bill_Lines` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);
            $row = $result->fetchAll();

            return (!empty($row)) ? new BillLinesDto($row[0]) : null;
        } catch (DatabaseException $exception) {
            return null;
        }
    }

    public function getAll(): array
    {
        $sql = "SELECT `id`, `line_amount`, `bill_id`, `line_coa_id`
                FROM `Bill_Lines`";

        try {
            $result = $this->db->prepare($sql);
            $result->execute();
            $rows = $result->fetchAll();

            $result = [];
            foreach ($rows as $row) {
                $result[] = new BillLinesDto($row);
            }

            return $result;
        } catch (DatabaseException $exception) {
            return [];
        }
    }

    public function delete(int $id): int
    {
        $sql = "DELETE FROM `Bill_Lines` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }
}