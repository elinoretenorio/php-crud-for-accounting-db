<?php

declare(strict_types=1);

namespace Accounting\ReceivedMoneyLines;

use JsonSerializable;

class ReceivedMoneyLinesModel implements JsonSerializable
{
    private int $id;
    private float $lineAmount;
    private int $receivedMoneyId;
    private int $lineCoaId;

    public function __construct(ReceivedMoneyLinesDto $dto = null)
    {
        if ($dto === null) {
            return;
        }

        $this->id = $dto->id;
        $this->lineAmount = $dto->lineAmount;
        $this->receivedMoneyId = $dto->receivedMoneyId;
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

    public function getReceivedMoneyId(): int
    {
        return $this->receivedMoneyId;
    }

    public function setReceivedMoneyId(int $receivedMoneyId): void
    {
        $this->receivedMoneyId = $receivedMoneyId;
    }

    public function getLineCoaId(): int
    {
        return $this->lineCoaId;
    }

    public function setLineCoaId(int $lineCoaId): void
    {
        $this->lineCoaId = $lineCoaId;
    }

    public function toDto(): ReceivedMoneyLinesDto
    {
        $dto = new ReceivedMoneyLinesDto();
        $dto->id = (int) ($this->id ?? 0);
        $dto->lineAmount = (float) ($this->lineAmount ?? 0);
        $dto->receivedMoneyId = (int) ($this->receivedMoneyId ?? 0);
        $dto->lineCoaId = (int) ($this->lineCoaId ?? 0);

        return $dto;
    }

    public function jsonSerialize(): array
    {
        return [
            "id" => $this->id,
            "line_amount" => $this->lineAmount,
            "received_money_id" => $this->receivedMoneyId,
            "line_coa_id" => $this->lineCoaId,
        ];
    }
}