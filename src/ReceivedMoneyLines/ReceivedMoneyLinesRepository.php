<?php

declare(strict_types=1);

namespace Accounting\ReceivedMoneyLines;

use Accounting\Database\IDatabase;
use Accounting\Database\DatabaseException;

class ReceivedMoneyLinesRepository implements IReceivedMoneyLinesRepository
{
    private IDatabase $db;

    public function __construct(IDatabase $db)
    {
        $this->db = $db;
    }

    public function insert(ReceivedMoneyLinesDto $dto): int
    {
        $sql = "INSERT INTO `Received_Money_Lines` (`line_amount`, `received_money_id`, `line_coa_id`)
                VALUES (?, ?, ?)";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->lineAmount,
                $dto->receivedMoneyId,
                $dto->lineCoaId
            ]);

            return $this->db->lastInsertId();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function update(ReceivedMoneyLinesDto $dto): int
    {
        $sql = "UPDATE `Received_Money_Lines` SET `line_amount` = ?, `received_money_id` = ?, `line_coa_id` = ?
                WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->lineAmount,
                $dto->receivedMoneyId,
                $dto->lineCoaId,
                $dto->id
            ]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function get(int $id): ?ReceivedMoneyLinesDto
    {
        $sql = "SELECT `id`, `line_amount`, `received_money_id`, `line_coa_id`
                FROM `Received_Money_Lines` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);
            $row = $result->fetchAll();

            return (!empty($row)) ? new ReceivedMoneyLinesDto($row[0]) : null;
        } catch (DatabaseException $exception) {
            return null;
        }
    }

    public function getAll(): array
    {
        $sql = "SELECT `id`, `line_amount`, `received_money_id`, `line_coa_id`
                FROM `Received_Money_Lines`";

        try {
            $result = $this->db->prepare($sql);
            $result->execute();
            $rows = $result->fetchAll();

            $result = [];
            foreach ($rows as $row) {
                $result[] = new ReceivedMoneyLinesDto($row);
            }

            return $result;
        } catch (DatabaseException $exception) {
            return [];
        }
    }

    public function delete(int $id): int
    {
        $sql = "DELETE FROM `Received_Money_Lines` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }
}