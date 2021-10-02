<?php

declare(strict_types=1);

namespace Accounting\Invoices;

interface IInvoicesService
{
    public function insert(InvoicesModel $model): int;

    public function update(InvoicesModel $model): int;

    public function get(int $id): ?InvoicesModel;

    public function getAll(): array;

    public function delete(int $id): int;

    public function createModel(array $row): ?InvoicesModel;
}