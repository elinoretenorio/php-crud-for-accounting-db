<?php

declare(strict_types=1);

namespace Accounting\BillPayments;

interface IBillPaymentsRepository
{
    public function insert(BillPaymentsDto $dto): int;

    public function update(BillPaymentsDto $dto): int;

    public function get(int $id): ?BillPaymentsDto;

    public function getAll(): array;

    public function delete(int $id): int;
}