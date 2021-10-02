<?php

declare(strict_types=1);

namespace Accounting\ReceivedMoneys;

use JsonSerializable;

class ReceivedMoneysModel implements JsonSerializable
{
    private int $id;
    private string $tranDate;
    private string $description;
    private string $reference;
    private float $total;
    private int $customerId;
    private int $coaId;

    public function __construct(ReceivedMoneysDto $dto = null)
    {
        if ($dto === null) {
            return;
        }

        $this->id = $dto->id;
        $this->tranDate = $dto->tranDate;
        $this->description = $dto->description;
        $this->reference = $dto->reference;
        $this->total = $dto->total;
        $this->customerId = $dto->customerId;
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

    public function getCustomerId(): int
    {
        return $this->customerId;
    }

    public function setCustomerId(int $customerId): void
    {
        $this->customerId = $customerId;
    }

    public function getCoaId(): int
    {
        return $this->coaId;
    }

    public function setCoaId(int $coaId): void
    {
        $this->coaId = $coaId;
    }

    public function toDto(): ReceivedMoneysDto
    {
        $dto = new ReceivedMoneysDto();
        $dto->id = (int) ($this->id ?? 0);
        $dto->tranDate = $this->tranDate ?? "";
        $dto->description = $this->description ?? "";
        $dto->reference = $this->reference ?? "";
        $dto->total = (float) ($this->total ?? 0);
        $dto->customerId = (int) ($this->customerId ?? 0);
        $dto->coaId = (int) ($this->coaId ?? 0);

        return $dto;
    }

    public function jsonSerialize(): array
    {
        return [
            "id" => $this->id,
            "tran_date" => $this->tranDate,
            "description" => $this->description,
            "reference" => $this->reference,
            "total" => $this->total,
            "customer_id" => $this->customerId,
            "coa_id" => $this->coaId,
        ];
    }
}