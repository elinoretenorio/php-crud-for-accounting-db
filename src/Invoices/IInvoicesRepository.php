<?php

declare(strict_types=1);

namespace Accounting\Invoices;

interface IInvoicesRepository
{
    public function insert(InvoicesDto $dto): int;

    public function update(InvoicesDto $dto): int;

    public function get(int $id): ?InvoicesDto;

    public function getAll(): array;

    public function delete(int $id): int;
}