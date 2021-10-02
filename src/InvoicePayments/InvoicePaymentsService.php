<?php

declare(strict_types=1);

namespace Accounting\InvoicePayments;

class InvoicePaymentsService implements IInvoicePaymentsService
{
    private IInvoicePaymentsRepository $repository;

    public function __construct(IInvoicePaymentsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function insert(InvoicePaymentsModel $model): int
    {
        return $this->repository->insert($model->toDto());
    }

    public function update(InvoicePaymentsModel $model): int
    {
        return $this->repository->update($model->toDto());
    }

    public function get(int $id): ?InvoicePaymentsModel
    {
        $dto = $this->repository->get($id);
        if ($dto === null) {
            return null;
        }

        return new InvoicePaymentsModel($dto);
    }

    public function getAll(): array
    {
        $dtos = $this->repository->getAll();

        $result = [];
        /* @var InvoicePaymentsDto $dto */
        foreach ($dtos as $dto) {
            $result[] = new InvoicePaymentsModel($dto);
        }

        return $result;
    }

    public function delete(int $id): int
    {
        return $this->repository->delete($id);
    }

    public function createModel(array $row): ?InvoicePaymentsModel
    {
        if (empty($row)) {
            return null;
        }

        $dto = new InvoicePaymentsDto($row);

        return new InvoicePaymentsModel($dto);
    }
}