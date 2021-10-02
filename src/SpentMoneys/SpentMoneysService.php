<?php

declare(strict_types=1);

namespace Accounting\SpentMoneys;

class SpentMoneysService implements ISpentMoneysService
{
    private ISpentMoneysRepository $repository;

    public function __construct(ISpentMoneysRepository $repository)
    {
        $this->repository = $repository;
    }

    public function insert(SpentMoneysModel $model): int
    {
        return $this->repository->insert($model->toDto());
    }

    public function update(SpentMoneysModel $model): int
    {
        return $this->repository->update($model->toDto());
    }

    public function get(int $id): ?SpentMoneysModel
    {
        $dto = $this->repository->get($id);
        if ($dto === null) {
            return null;
        }

        return new SpentMoneysModel($dto);
    }

    public function getAll(): array
    {
        $dtos = $this->repository->getAll();

        $result = [];
        /* @var SpentMoneysDto $dto */
        foreach ($dtos as $dto) {
            $result[] = new SpentMoneysModel($dto);
        }

        return $result;
    }

    public function delete(int $id): int
    {
        return $this->repository->delete($id);
    }

    public function createModel(array $row): ?SpentMoneysModel
    {
        if (empty($row)) {
            return null;
        }

        $dto = new SpentMoneysDto($row);

        return new SpentMoneysModel($dto);
    }
}