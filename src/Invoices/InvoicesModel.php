<?php

declare(strict_types=1);

namespace Accounting\Invoices;

use JsonSerializable;

class InvoicesModel implements JsonSerializable
{
    private int $id;
    private string $tranDate;
    private string $dueDate;
    private string $description;
    private string $reference;
    private float $total;
    private bool $status;
    private int $customerId;
    private int $invoicePaymentId;
    private int $coaId;

    public function __construct(InvoicesDto $dto = null)
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
        $this->customerId = $dto->customerId;
        $this->invoicePaymentId = $dto->invoicePaymentId;
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

    public function getCustomerId(): int
    {
        return $this->customerId;
    }

    public function setCustomerId(int $customerId): void
    {
        $this->customerId = $customerId;
    }

    public function getInvoicePaymentId(): int
    {
        return $this->invoicePaymentId;
    }

    public function setInvoicePaymentId(int $invoicePaymentId): void
    {
        $this->invoicePaymentId = $invoicePaymentId;
    }

    public function getCoaId(): int
    {
        return $this->coaId;
    }

    public function setCoaId(int $coaId): void
    {
        $this->coaId = $coaId;
    }

    public function toDto(): InvoicesDto
    {
        $dto = new InvoicesDto();
        $dto->id = (int) ($this->id ?? 0);
        $dto->tranDate = $this->tranDate ?? "";
        $dto->dueDate = $this->dueDate ?? "";
        $dto->description = $this->description ?? "";
        $dto->reference = $this->reference ?? "";
        $dto->total = (float) ($this->total ?? 0);
        $dto->status = (bool) $this->status;
        $dto->customerId = (int) ($this->customerId ?? 0);
        $dto->invoicePaymentId = (int) ($this->invoicePaymentId ?? 0);
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
            "customer_id" => $this->customerId,
            "invoice_payment_id" => $this->invoicePaymentId,
            "coa_id" => $this->coaId,
        ];
    }
}