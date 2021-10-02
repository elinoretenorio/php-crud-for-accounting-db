<?php

declare(strict_types=1);

namespace Accounting\Bills;

use JsonSerializable;

class BillsModel implements JsonSerializable
{
    private int $id;
    private string $tranDate;
    private string $dueDate;
    private string $description;
    private string $reference;
    private float $total;
    private bool $status;
    private int $supplierId;
    private int $billPaymentId;
    private int $coaId;

    public function __construct(BillsDto $dto = null)
    {
        if ($dto === null) {
            return;
        }

        $this->id = $dto->id;
        $this->tranDate = $dto->tranDate;
        $this->dueDate = $dto->dueDate;
        $this->description = $dto->description;
        $this->reference = $dto->reference;
        $this->total = $dto->total;
        $this->status = $dto->status;
        $this->supplierId = $dto->supplierId;
        $this->billPaymentId = $dto->billPaymentId;
        $this->coaId = $dto->coaId;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getTranDate(): string
    {
        return $this->tranDate;
    }

    public function setTranDate(string $tranDate): void
    {
        $this->tranDate = $tranDate;
    }

    public function getDueDate(): string
    {
        return $this->dueDate;
    }

    public function setDueDate(string $dueDate): void
    {
        $this->dueDate = $dueDate;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getReference(): string
    {
        return $this->reference;
    }

    public function setReference(string $reference): void
    {
        $this->reference = $reference;
    }

    public function getTotal(): float
    {
        return $this->total;
    }

    public function setTotal(float $total): void
    {
        $this->total = $total;
    }

    public function getStatus(): bool
    {
        return $this->status;
    }

    public function setStatus(bool $status): void
    {
        $this->status = $status;
    }

    public function getSupplierId(): int
    {
        return $this->supplierId;
    }

    public function setSupplierId(int $supplierId): void
    {
        $this->supplierId = $supplierId;
    }

    public function getBillPaymentId(): int
    {
        return $this->billPaymentId;
    }

    public function setBillPaymentId(int $billPaymentId): void
    {
        $this->billPaymentId = $billPaymentId;
    }

    public function getCoaId(): int
    {
        return $this->coaId;
    }

    public function setCoaId(int $coaId): void
    {
        $this->coaId = $coaId;
    }

    public function toDto(): BillsDto
    {
        $dto = new BillsDto();
        $dto->id = (int) ($this->id ?? 0);
        $dto->tranDate = $this->tranDate ?? "";
        $dto->dueDate = $this->dueDate ?? "";
        $dto->description = $this->description ?? "";
        $dto->reference = $this->reference ?? "";
        $dto->total = (float) ($this->total ?? 0);
        $dto->status = (bool) $this->status;
        $dto->supplierId = (int) ($this->supplierId ?? 0);
        $dto->billPaymentId = (int) ($this->billPaymentId ?? 0);
        $dto->coaId = (int) ($this->coaId ?? 0);

        return $dto;
    }

    public function jsonSerialize(): array
    {
        return [
            "id" => $this->id,
            "tran_date" => $this->tranDate,
            "due_date" => $this->dueDate,
            "description" => $this->description,
            "reference" => $this->reference,
            "total" => $this->total,
            "status" => $this->status,
            "supplier_id" => $this->supplierId,
            "bill_payment_id" => $this->billPaymentId,
            "coa_id" => $this->coaId,
        ];
    }
}