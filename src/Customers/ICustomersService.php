<?php

declare(strict_types=1);

namespace Accounting\Customers;

interface ICustomersService
{
    public function insert(CustomersModel $model): int;

    public function update(CustomersModel $model): int;

    public function get(int $id): ?CustomersModel;

    public function getAll(): array;

    public function delete(int $id): int;

    public function createModel(array $row): ?CustomersModel;
}