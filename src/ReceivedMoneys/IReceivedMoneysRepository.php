<?php

declare(strict_types=1);

namespace Accounting\ReceivedMoneys;

interface IReceivedMoneysRepository
{
    public function insert(ReceivedMoneysDto $dto): int;

    public function update(ReceivedMoneysDto $dto): int;

    public function get(int $id): ?ReceivedMoneysDto;

    public function getAll(): array;

    public function delete(int $id): int;
}