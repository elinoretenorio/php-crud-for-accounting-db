<?php

declare(strict_types=1);

namespace Accounting\Bills;

class BillsService implements IBillsService
{
    private IBillsRepository $repository;

    public function __construct(IBillsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function insert(BillsModel $model): int
    {
        return $this->repository->insert($model->toDto());
    }

    public function update(BillsModel $model): int
    {
        return $this->repository->update($model->toDto());
    }

    public function get(int $id): ?BillsModel
    {
        $dto = $this->repository->get($id);
        if ($dto === null) {
            return null;
        }

        return new BillsModel($dto);
    }

    public function getAll(): array
    {
        $dtos = $this->repository->getAll();

        $result = [];
        /* @var BillsDto $dto */
        foreach ($dtos as $dto) {
            $result[] = new BillsModel($dto);
        }

        return $result;
    }

    public function delete(int $id): int
    {
        return $this->repository->delete($id);
    }

    public function createModel(array $row): ?BillsModel
    {
        if (empty($row)) {
            return null;
        }

        $dto = new BillsDto($row);

        return new BillsModel($dto);
    }
}