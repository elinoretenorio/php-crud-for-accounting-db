<?php

declare(strict_types=1);

namespace Accounting\InvoiceLines;

class InvoiceLinesService implements IInvoiceLinesService
{
    private IInvoiceLinesRepository $repository;

    public function __construct(IInvoiceLinesRepository $repository)
    {
        $this->repository = $repository;
    }

    public function insert(InvoiceLinesModel $model): int
    {
        return $this->repository->insert($model->toDto());
    }

    public function update(InvoiceLinesModel $model): int
    {
        return $this->repository->update($model->toDto());
    }

    public function get(int $id): ?InvoiceLinesModel
    {
        $dto = $this->repository->get($id);
        if ($dto === null) {
            return null;
        }

        return new InvoiceLinesModel($dto);
    }

    public function getAll(): array
    {
        $dtos = $this->repository->getAll();

        $result = [];
        /* @var InvoiceLinesDto $dto */
        foreach ($dtos as $dto) {
            $result[] = new InvoiceLinesModel($dto);
        }

        return $result;
    }

    public function delete(int $id): int
    {
        return $this->repository->delete($id);
    }

    public function createModel(array $row): ?InvoiceLinesModel
    {
        if (empty($row)) {
            return null;
        }

        $dto = new InvoiceLinesDto($row);

        return new InvoiceLinesModel($dto);
    }
}