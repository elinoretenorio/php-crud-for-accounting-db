<?php

declare(strict_types=1);

namespace Accounting\BillLines;

interface IBillLinesRepository
{
    public function insert(BillLinesDto $dto): int;

    public function update(BillLinesDto $dto): int;

    public function get(int $id): ?BillLinesDto;

    public function getAll(): array;

    public function delete(int $id): int;
}