<?php

declare(strict_types=1);

namespace Accounting\Customers;

interface ICustomersRepository
{
    public function insert(CustomersDto $dto): int;

    public function update(CustomersDto $dto): int;

    public function get(int $id): ?CustomersDto;

    public function getAll(): array;

    public function delete(int $id): int;
}