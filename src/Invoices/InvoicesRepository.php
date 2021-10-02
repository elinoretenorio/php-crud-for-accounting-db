<?php

declare(strict_types=1);

namespace Accounting\Invoices;

use Accounting\Database\IDatabase;
use Accounting\Database\DatabaseException;

class InvoicesRepository implements IInvoicesRepository
{
    private IDatabase $db;

    public function __construct(IDatabase $db)
    {
        $this->db = $db;
    }

    public function insert(InvoicesDto $dto): int
    {
        $sql = "INSERT INTO `Invoices` (`tran_date`, `due_date`, `description`, `reference`, `total`, `status`, `customer_id`, `invoice_payment_id`, `coa_id`)
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
                $dto->customerId,
                $dto->invoicePaymentId,
                $dto->coaId
            ]);

            return $this->db->lastInsertId();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function update(InvoicesDto $dto): int
    {
        $sql = "UPDATE `Invoices` SET `tran_date` = ?, `due_date` = ?, `description` = ?, `reference` = ?, `total` = ?, `status` = ?, `customer_id` = ?, `invoice_payment_id` = ?, `coa_id` = ?
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
                $dto->customerId,
                $dto->invoicePaymentId,
                $dto->coaId,
                $dto->id
            ]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function get(int $id): ?InvoicesDto
    {
        $sql = "SELECT `id`, `tran_date`, `due_date`, `description`, `reference`, `total`, `status`, `customer_id`, `invoice_payment_id`, `coa_id`
                FROM `Invoices` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);
            $row = $result->fetchAll();

            return (!empty($row)) ? new InvoicesDto($row[0]) : null;
        } catch (DatabaseException $exception) {
            return null;
        }
    }

    public function getAll(): array
    {
        $sql = "SELECT `id`, `tran_date`, `due_date`, `description`, `reference`, `total`, `status`, `customer_id`, `invoice_payment_id`, `coa_id`
                FROM `Invoices`";

        try {
            $result = $this->db->prepare($sql);
            $result->execute();
            $rows = $result->fetchAll();

            $result = [];
            foreach ($rows as $row) {
                $result[] = new InvoicesDto($row);
            }

            return $result;
        } catch (DatabaseException $exception) {
            return [];
        }
    }

    public function delete(int $id): int
    {
        $sql = "DELETE FROM `Invoices` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }
}