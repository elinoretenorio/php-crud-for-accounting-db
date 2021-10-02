<?php

declare(strict_types=1);

namespace Accounting\ReceivedMoneyLines;

interface IReceivedMoneyLinesRepository
{
    public function insert(ReceivedMoneyLinesDto $dto): int;

    public function update(ReceivedMoneyLinesDto $dto): int;

    public function get(int $id): ?ReceivedMoneyLinesDto;

    public function getAll(): array;

    public function delete(int $id): int;
}