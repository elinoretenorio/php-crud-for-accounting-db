<?php

declare(strict_types=1);

namespace Accounting\InvoicePayments;

interface IInvoicePaymentsService
{
    public function insert(InvoicePaymentsModel $model): int;

    public function update(InvoicePaymentsModel $model): int;

    public function get(int $id): ?InvoicePaymentsModel;

    public function getAll(): array;

    public function delete(int $id): int;

    public function createModel(array $row): ?InvoicePaymentsModel;
}