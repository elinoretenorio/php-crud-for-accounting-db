<?php

declare(strict_types=1);

namespace Accounting\InvoiceLines;

interface IInvoiceLinesRepository
{
    public function insert(InvoiceLinesDto $dto): int;

    public function update(InvoiceLinesDto $dto): int;

    public function get(int $id): ?InvoiceLinesDto;

    public function getAll(): array;

    public function delete(int $id): int;
}