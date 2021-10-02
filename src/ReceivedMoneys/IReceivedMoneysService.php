<?php

declare(strict_types=1);

namespace Accounting\ReceivedMoneys;

interface IReceivedMoneysService
{
    public function insert(ReceivedMoneysModel $model): int;

    public function update(ReceivedMoneysModel $model): int;

    public function get(int $id): ?ReceivedMoneysModel;

    public function getAll(): array;

    public function delete(int $id): int;

    public function createModel(array $row): ?ReceivedMoneysModel;
}