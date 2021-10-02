<?php

declare(strict_types=1);

namespace Accounting\Bills;

interface IBillsRepository
{
    public function insert(BillsDto $dto): int;

    public function update(BillsDto $dto): int;

    public function get(int $id): ?BillsDto;

    public function getAll(): array;

    public function delete(int $id): int;
}