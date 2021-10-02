<?php

declare(strict_types=1);

namespace Accounting\InvoicePayments;

use Accounting\Database\IDatabase;
use Accounting\Database\DatabaseException;

class InvoicePaymentsRepository implements IInvoicePaymentsRepository
{
    private IDatabase $db;

    public function __construct(IDatabase $db)
    {
        $this->db = $db;
    }

    public function insert(InvoicePaymentsDto $dto): int
    {
        $sql = "INSERT INTO `Invoice_Payments` (`tran_date`, `description`, `reference`, `total`, `coa_id`)
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

    public function update(InvoicePaymentsDto $dto): int
    {
        $sql = "UPDATE `Invoice_Payments` SET `tran_date` = ?, `description` = ?, `reference` = ?, `total` = ?, `coa_id` = ?
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

    public function get(int $id): ?InvoicePaymentsDto
    {
        $sql = "SELECT `id`, `tran_date`, `description`, `reference`, `total`, `coa_id`
                FROM `Invoice_Payments` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);
            $row = $result->fetchAll();

            return (!empty($row)) ? new InvoicePaymentsDto($row[0]) : null;
        } catch (DatabaseException $exception) {
            return null;
        }
    }

    public function getAll(): array
    {
        $sql = "SELECT `id`, `tran_date`, `description`, `reference`, `total`, `coa_id`
                FROM `Invoice_Payments`";

        try {
            $result = $this->db->prepare($sql);
            $result->execute();
            $rows = $result->fetchAll();

            $result = [];
            foreach ($rows as $row) {
                $result[] = new InvoicePaymentsDto($row);
            }

            return $result;
        } catch (DatabaseException $exception) {
            return [];
        }
    }

    public function delete(int $id): int
    {
        $sql = "DELETE FROM `Invoice_Payments` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }
}