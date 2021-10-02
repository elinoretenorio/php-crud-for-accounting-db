<?php

declare(strict_types=1);

namespace Accounting\Invoices;

class InvoicesService implements IInvoicesService
{
    private IInvoicesRepository $repository;

    public function __construct(IInvoicesRepository $repository)
    {
        $this->repository = $repository;
    }

    public function insert(InvoicesModel $model): int
    {
        return $this->repository->insert($model->toDto());
    }

    public function update(InvoicesModel $model): int
    {
        return $this->repository->update($model->toDto());
    }

    public function get(int $id): ?InvoicesModel
    {
        $dto = $this->repository->get($id);
        if ($dto === null) {
            return null;
        }

        return new InvoicesModel($dto);
    }

    public function getAll(): array
    {
        $dtos = $this->repository->getAll();

        $result = [];
        /* @var InvoicesDto $dto */
        foreach ($dtos as $dto) {
            $result[] = new InvoicesModel($dto);
        }

        return $result;
    }

    public function delete(int $id): int
    {
        return $this->repository->delete($id);
    }

    public function createModel(array $row): ?InvoicesModel
    {
        if (empty($row)) {
            return null;
        }

        $dto = new InvoicesDto($row);

        return new InvoicesModel($dto);
    }
}