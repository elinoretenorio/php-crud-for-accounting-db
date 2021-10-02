<?php

declare(strict_types=1);

namespace Accounting\InvoicePayments;

interface IInvoicePaymentsRepository
{
    public function insert(InvoicePaymentsDto $dto): int;

    public function update(InvoicePaymentsDto $dto): int;

    public function get(int $id): ?InvoicePaymentsDto;

    public function getAll(): array;

    public function delete(int $id): int;
}