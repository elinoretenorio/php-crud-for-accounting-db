<?php

declare(strict_types=1);

namespace Accounting\BillLines;

interface IBillLinesService
{
    public function insert(BillLinesModel $model): int;

    public function update(BillLinesModel $model): int;

    public function get(int $id): ?BillLinesModel;

    public function getAll(): array;

    public function delete(int $id): int;

    public function createModel(array $row): ?BillLinesModel;
}