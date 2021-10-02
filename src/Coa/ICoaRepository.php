<?php

declare(strict_types=1);

namespace Accounting\Coa;

interface ICoaRepository
{
    public function insert(CoaDto $dto): int;

    public function update(CoaDto $dto): int;

    public function get(int $id): ?CoaDto;

    public function getAll(): array;

    public function delete(int $id): int;
}