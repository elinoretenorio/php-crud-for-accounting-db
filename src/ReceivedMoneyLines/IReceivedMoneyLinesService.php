<?php

declare(strict_types=1);

namespace Accounting\ReceivedMoneyLines;

interface IReceivedMoneyLinesService
{
    public function insert(ReceivedMoneyLinesModel $model): int;

    public function update(ReceivedMoneyLinesModel $model): int;

    public function get(int $id): ?ReceivedMoneyLinesModel;

    public function getAll(): array;

    public function delete(int $id): int;

    public function createModel(array $row): ?ReceivedMoneyLinesModel;
}