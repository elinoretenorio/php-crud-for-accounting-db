<?php

declare(strict_types=1);

namespace Accounting\SpentMoneys;

interface ISpentMoneysService
{
    public function insert(SpentMoneysModel $model): int;

    public function update(SpentMoneysModel $model): int;

    public function get(int $id): ?SpentMoneysModel;

    public function getAll(): array;

    public function delete(int $id): int;

    public function createModel(array $row): ?SpentMoneysModel;
}