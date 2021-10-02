<?php

declare(strict_types=1);

namespace Accounting\BillPayments;

interface IBillPaymentsService
{
    public function insert(BillPaymentsModel $model): int;

    public function update(BillPaymentsModel $model): int;

    public function get(int $id): ?BillPaymentsModel;

    public function getAll(): array;

    public function delete(int $id): int;

    public function createModel(array $row): ?BillPaymentsModel;
}