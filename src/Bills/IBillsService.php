<?php

declare(strict_types=1);

namespace Accounting\Bills;

interface IBillsService
{
    public function insert(BillsModel $model): int;

    public function update(BillsModel $model): int;

    public function get(int $id): ?BillsModel;

    public function getAll(): array;

    public function delete(int $id): int;

    public function createModel(array $row): ?BillsModel;
}