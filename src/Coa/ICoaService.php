<?php

declare(strict_types=1);

namespace Accounting\Coa;

interface ICoaService
{
    public function insert(CoaModel $model): int;

    public function update(CoaModel $model): int;

    public function get(int $id): ?CoaModel;

    public function getAll(): array;

    public function delete(int $id): int;

    public function createModel(array $row): ?CoaModel;
}