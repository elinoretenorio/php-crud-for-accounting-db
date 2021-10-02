<?php

declare(strict_types=1);

namespace Accounting\BillLines;

class BillLinesService implements IBillLinesService
{
    private IBillLinesRepository $repository;

    public function __construct(IBillLinesRepository $repository)
    {
        $this->repository = $repository;
    }

    public function insert(BillLinesModel $model): int
    {
        return $this->repository->insert($model->toDto());
    }

    public function update(BillLinesModel $model): int
    {
        return $this->repository->update($model->toDto());
    }

    public function get(int $id): ?BillLinesModel
    {
        $dto = $this->repository->get($id);
        if ($dto === null) {
            return null;
        }

        return new BillLinesModel($dto);
    }

    public function getAll(): array
    {
        $dtos = $this->repository->getAll();

        $result = [];
        /* @var BillLinesDto $dto */
        foreach ($dtos as $dto) {
            $result[] = new BillLinesModel($dto);
        }

        return $result;
    }

    public function delete(int $id): int
    {
        return $this->repository->delete($id);
    }

    public function createModel(array $row): ?BillLinesModel
    {
        if (empty($row)) {
            return null;
        }

        $dto = new BillLinesDto($row);

        return new BillLinesModel($dto);
    }
}