<?php

declare(strict_types=1);

namespace Accounting\InvoiceLines;

use JsonSerializable;

class InvoiceLinesModel implements JsonSerializable
{
    private int $id;
    private float $lineAmount;
    private int $invoiceId;
    private int $lineCoaId;

    public function __construct(InvoiceLinesDto $dto = null)
    {
        if ($dto === null) {
            return;
        }

        $this->id = $dto->id;
        $this->lineAmount = $dto->lineAmount;
        $this->invoiceId = $dto->invoiceId;
        $this->lineCoaId = $dto->lineCoaId;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getLineAmount(): float
    {
        return $this->lineAmount;
    }

    public function setLineAmount(float $lineAmount): void
    {
        $this->lineAmount = $lineAmount;
    }

    public function getInvoiceId(): int
    {
        return $this->invoiceId;
    }

    public function setInvoiceId(int $invoiceId): void
    {
        $this->invoiceId = $invoiceId;
    }

    public function getLineCoaId(): int
    {
        return $this->lineCoaId;
    }

    public function setLineCoaId(int $lineCoaId): void
    {
        $this->lineCoaId = $lineCoaId;
    }

    public function toDto(): InvoiceLinesDto
    {
        $dto = new InvoiceLinesDto();
        $dto->id = (int) ($this->id ?? 0);
        $dto->lineAmount = (float) ($this->lineAmount ?? 0);
        $dto->invoiceId = (int) ($this->invoiceId ?? 0);
        $dto->lineCoaId = (int) ($this->lineCoaId ?? 0);

        return $dto;
    }

    public function jsonSerialize(): array
    {
        return [
            "id" => $this->id,
            "line_amount" => $this->lineAmount,
            "invoice_id" => $this->invoiceId,
            "line_coa_id" => $this->lineCoaId,
        ];
    }
}