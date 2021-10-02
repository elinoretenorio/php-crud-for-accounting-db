<?php

declare(strict_types=1);

namespace Accounting\InvoiceLines;

interface IInvoiceLinesService
{
    public function insert(InvoiceLinesModel $model): int;

    public function update(InvoiceLinesModel $model): int;

    public function get(int $id): ?InvoiceLinesModel;

    public function getAll(): array;

    public function delete(int $id): int;

    public function createModel(array $row): ?InvoiceLinesModel;
}