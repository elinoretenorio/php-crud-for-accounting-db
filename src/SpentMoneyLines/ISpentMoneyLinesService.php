<?php

declare(strict_types=1);

namespace Accounting\SpentMoneyLines;

interface ISpentMoneyLinesService
{
    public function insert(SpentMoneyLinesModel $model): int;

    public function update(SpentMoneyLinesModel $model): int;

    public function get(int $id): ?SpentMoneyLinesModel;

    public function getAll(): array;

    public function delete(int $id): int;

    public function createModel(array $row): ?SpentMoneyLinesModel;
}