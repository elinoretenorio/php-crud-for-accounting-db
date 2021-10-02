<?php

declare(strict_types=1);

namespace Accounting\Coa;

class CoaService implements ICoaService
{
    private ICoaRepository $repository;

    public function __construct(ICoaRepository $repository)
    {
        $this->repository = $repository;
    }

    public function insert(CoaModel $model): int
    {
        return $this->repository->insert($model->toDto());
    }

    public function update(CoaModel $model): int
    {
        return $this->repository->update($model->toDto());
    }

    public function get(int $id): ?CoaModel
    {
        $dto = $this->repository->get($id);
        if ($dto === null) {
            return null;
        }

        return new CoaModel($dto);
    }

    public function getAll(): array
    {
        $dtos = $this->repository->getAll();

        $result = [];
        /* @var CoaDto $dto */
        foreach ($dtos as $dto) {
            $result[] = new CoaModel($dto);
        }

        return $result;
    }

    public function delete(int $id): int
    {
        return $this->repository->delete($id);
    }

    public function createModel(array $row): ?CoaModel
    {
        if (empty($row)) {
            return null;
        }

        $dto = new CoaDto($row);

        return new CoaModel($dto);
    }
}