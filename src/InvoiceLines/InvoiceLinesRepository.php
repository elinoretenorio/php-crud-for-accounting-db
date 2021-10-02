<?php

declare(strict_types=1);

namespace Accounting\InvoiceLines;

use Accounting\Database\IDatabase;
use Accounting\Database\DatabaseException;

class InvoiceLinesRepository implements IInvoiceLinesRepository
{
    private IDatabase $db;

    public function __construct(IDatabase $db)
    {
        $this->db = $db;
    }

    public function insert(InvoiceLinesDto $dto): int
    {
        $sql = "INSERT INTO `Invoice_Lines` (`line_amount`, `invoice_id`, `line_coa_id`)
                VALUES (?, ?, ?)";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->lineAmount,
                $dto->invoiceId,
                $dto->lineCoaId
            ]);

            return $this->db->lastInsertId();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function update(InvoiceLinesDto $dto): int
    {
        $sql = "UPDATE `Invoice_Lines` SET `line_amount` = ?, `invoice_id` = ?, `line_coa_id` = ?
                WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->lineAmount,
                $dto->invoiceId,
                $dto->lineCoaId,
                $dto->id
            ]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function get(int $id): ?InvoiceLinesDto
    {
        $sql = "SELECT `id`, `line_amount`, `invoice_id`, `line_coa_id`
                FROM `Invoice_Lines` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);
            $row = $result->fetchAll();

            return (!empty($row)) ? new InvoiceLinesDto($row[0]) : null;
        } catch (DatabaseException $exception) {
            return null;
        }
    }

    public function getAll(): array
    {
        $sql = "SELECT `id`, `line_amount`, `invoice_id`, `line_coa_id`
                FROM `Invoice_Lines`";

        try {
            $result = $this->db->prepare($sql);
            $result->execute();
            $rows = $result->fetchAll();

            $result = [];
            foreach ($rows as $row) {
                $result[] = new InvoiceLinesDto($row);
            }

            return $result;
        } catch (DatabaseException $exception) {
            return [];
        }
    }

    public function delete(int $id): int
    {
        $sql = "DELETE FROM `Invoice_Lines` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }
}