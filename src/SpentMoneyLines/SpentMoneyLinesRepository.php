<?php

declare(strict_types=1);

namespace Accounting\SpentMoneyLines;

use Accounting\Database\IDatabase;
use Accounting\Database\DatabaseException;

class SpentMoneyLinesRepository implements ISpentMoneyLinesRepository
{
    private IDatabase $db;

    public function __construct(IDatabase $db)
    {
        $this->db = $db;
    }

    public function insert(SpentMoneyLinesDto $dto): int
    {
        $sql = "INSERT INTO `Spent_Money_Lines` (`line_amount`, `spent_money_id`, `line_coa_id`)
                VALUES (?, ?, ?)";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->lineAmount,
                $dto->spentMoneyId,
                $dto->lineCoaId
            ]);

            return $this->db->lastInsertId();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function update(SpentMoneyLinesDto $dto): int
    {
        $sql = "UPDATE `Spent_Money_Lines` SET `line_amount` = ?, `spent_money_id` = ?, `line_coa_id` = ?
                WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->lineAmount,
                $dto->spentMoneyId,
                $dto->lineCoaId,
                $dto->id
            ]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function get(int $id): ?SpentMoneyLinesDto
    {
        $sql = "SELECT `id`, `line_amount`, `spent_money_id`, `line_coa_id`
                FROM `Spent_Money_Lines` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);
            $row = $result->fetchAll();

            return (!empty($row)) ? new SpentMoneyLinesDto($row[0]) : null;
        } catch (DatabaseException $exception) {
            return null;
        }
    }

    public function getAll(): array
    {
        $sql = "SELECT `id`, `line_amount`, `spent_money_id`, `line_coa_id`
                FROM `Spent_Money_Lines`";

        try {
            $result = $this->db->prepare($sql);
            $result->execute();
            $rows = $result->fetchAll();

            $result = [];
            foreach ($rows as $row) {
                $result[] = new SpentMoneyLinesDto($row);
            }

            return $result;
        } catch (DatabaseException $exception) {
            return [];
        }
    }

    public function delete(int $id): int
    {
        $sql = "DELETE FROM `Spent_Money_Lines` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }
}