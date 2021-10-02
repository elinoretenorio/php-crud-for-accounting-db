<?php

declare(strict_types=1);

namespace Accounting\SpentMoneyLines;

interface ISpentMoneyLinesRepository
{
    public function insert(SpentMoneyLinesDto $dto): int;

    public function update(SpentMoneyLinesDto $dto): int;

    public function get(int $id): ?SpentMoneyLinesDto;

    public function getAll(): array;

    public function delete(int $id): int;
}