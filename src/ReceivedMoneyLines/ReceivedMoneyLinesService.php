<?php

declare(strict_types=1);

namespace Accounting\ReceivedMoneyLines;

class ReceivedMoneyLinesService implements IReceivedMoneyLinesService
{
    private IReceivedMoneyLinesRepository $repository;

    public function __construct(IReceivedMoneyLinesRepository $repository)
    {
        $this->repository = $repository;
    }

    public function insert(ReceivedMoneyLinesModel $model): int
    {
        return $this->repository->insert($model->toDto());
    }

    public function update(ReceivedMoneyLinesModel $model): int
    {
        return $this->repository->update($model->toDto());
    }

    public function get(int $id): ?ReceivedMoneyLinesModel
    {
        $dto = $this->repository->get($id);
        if ($dto === null) {
            return null;
        }

        return new ReceivedMoneyLinesModel($dto);
    }

    public function getAll(): array
    {
        $dtos = $this->repository->getAll();

        $result = [];
        /* @var ReceivedMoneyLinesDto $dto */
        foreach ($dtos as $dto) {
            $result[] = new ReceivedMoneyLinesModel($dto);
        }

        return $result;
    }

    public function delete(int $id): int
    {
        return $this->repository->delete($id);
    }

    public function createModel(array $row): ?ReceivedMoneyLinesModel
    {
        if (empty($row)) {
            return null;
        }

        $dto = new ReceivedMoneyLinesDto($row);

        return new ReceivedMoneyLinesModel($dto);
    }
}