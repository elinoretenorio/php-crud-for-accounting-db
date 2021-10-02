<?php

declare(strict_types=1);

namespace Accounting\SpentMoneyLines;

class SpentMoneyLinesService implements ISpentMoneyLinesService
{
    private ISpentMoneyLinesRepository $repository;

    public function __construct(ISpentMoneyLinesRepository $repository)
    {
        $this->repository = $repository;
    }

    public function insert(SpentMoneyLinesModel $model): int
    {
        return $this->repository->insert($model->toDto());
    }

    public function update(SpentMoneyLinesModel $model): int
    {
        return $this->repository->update($model->toDto());
    }

    public function get(int $id): ?SpentMoneyLinesModel
    {
        $dto = $this->repository->get($id);
        if ($dto === null) {
            return null;
        }

        return new SpentMoneyLinesModel($dto);
    }

    public function getAll(): array
    {
        $dtos = $this->repository->getAll();

        $result = [];
        /* @var SpentMoneyLinesDto $dto */
        foreach ($dtos as $dto) {
            $result[] = new SpentMoneyLinesModel($dto);
        }

        return $result;
    }

    public function delete(int $id): int
    {
        return $this->repository->delete($id);
    }

    public function createModel(array $row): ?SpentMoneyLinesModel
    {
        if (empty($row)) {
            return null;
        }

        $dto = new SpentMoneyLinesDto($row);

        return new SpentMoneyLinesModel($dto);
    }
}