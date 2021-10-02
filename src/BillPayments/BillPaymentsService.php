<?php

declare(strict_types=1);

namespace Accounting\BillPayments;

class BillPaymentsService implements IBillPaymentsService
{
    private IBillPaymentsRepository $repository;

    public function __construct(IBillPaymentsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function insert(BillPaymentsModel $model): int
    {
        return $this->repository->insert($model->toDto());
    }

    public function update(BillPaymentsModel $model): int
    {
        return $this->repository->update($model->toDto());
    }

    public function get(int $id): ?BillPaymentsModel
    {
        $dto = $this->repository->get($id);
        if ($dto === null) {
            return null;
        }

        return new BillPaymentsModel($dto);
    }

    public function getAll(): array
    {
        $dtos = $this->repository->getAll();

        $result = [];
        /* @var BillPaymentsDto $dto */
        foreach ($dtos as $dto) {
            $result[] = new BillPaymentsModel($dto);
        }

        return $result;
    }

    public function delete(int $id): int
    {
        return $this->repository->delete($id);
    }

    public function createModel(array $row): ?BillPaymentsModel
    {
        if (empty($row)) {
            return null;
        }

        $dto = new BillPaymentsDto($row);

        return new BillPaymentsModel($dto);
    }
}