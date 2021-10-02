<?php

declare(strict_types=1);

namespace Accounting\ReceivedMoneys;

class ReceivedMoneysService implements IReceivedMoneysService
{
    private IReceivedMoneysRepository $repository;

    public function __construct(IReceivedMoneysRepository $repository)
    {
        $this->repository = $repository;
    }

    public function insert(ReceivedMoneysModel $model): int
    {
        return $this->repository->insert($model->toDto());
    }

    public function update(ReceivedMoneysModel $model): int
    {
        return $this->repository->update($model->toDto());
    }

    public function get(int $id): ?ReceivedMoneysModel
    {
        $dto = $this->repository->get($id);
        if ($dto === null) {
            return null;
        }

        return new ReceivedMoneysModel($dto);
    }

    public function getAll(): array
    {
        $dtos = $this->repository->getAll();

        $result = [];
        /* @var ReceivedMoneysDto $dto */
        foreach ($dtos as $dto) {
            $result[] = new ReceivedMoneysModel($dto);
        }

        return $result;
    }

    public function delete(int $id): int
    {
        return $this->repository->delete($id);
    }

    public function createModel(array $row): ?ReceivedMoneysModel
    {
        if (empty($row)) {
            return null;
        }

        $dto = new ReceivedMoneysDto($row);

        return new ReceivedMoneysModel($dto);
    }
}