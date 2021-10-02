<?php

declare(strict_types=1);

namespace Accounting\SpentMoneys;

interface ISpentMoneysRepository
{
    public function insert(SpentMoneysDto $dto): int;

    public function update(SpentMoneysDto $dto): int;

    public function get(int $id): ?SpentMoneysDto;

    public function getAll(): array;

    public function delete(int $id): int;
}