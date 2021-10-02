<?php

declare(strict_types=1);

namespace Accounting\SpentMoneyLines;

use JsonSerializable;

class SpentMoneyLinesModel implements JsonSerializable
{
    private int $id;
    private float $lineAmount;
    private int $spentMoneyId;
    private int $lineCoaId;

    public function __construct(SpentMoneyLinesDto $dto = null)
    {
        if ($dto === null) {
            return;
        }

        $this->id = $dto->id;
        $this->lineAmount = $dto->lineAmount;
        $this->spentMoneyId = $dto->spentMoneyId;
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

    public function getSpentMoneyId(): int
    {
        return $this->spentMoneyId;
    }

    public function setSpentMoneyId(int $spentMoneyId): void
    {
        $this->spentMoneyId = $spentMoneyId;
    }

    public function getLineCoaId(): int
    {
        return $this->lineCoaId;
    }

    public function setLineCoaId(int $lineCoaId): void
    {
        $this->lineCoaId = $lineCoaId;
    }

    public function toDto(): SpentMoneyLinesDto
    {
        $dto = new SpentMoneyLinesDto();
        $dto->id = (int) ($this->id ?? 0);
        $dto->lineAmount = (float) ($this->lineAmount ?? 0);
        $dto->spentMoneyId = (int) ($this->spentMoneyId ?? 0);
        $dto->lineCoaId = (int) ($this->lineCoaId ?? 0);

        return $dto;
    }

    public function jsonSerialize(): array
    {
        return [
            "id" => $this->id,
            "line_amount" => $this->lineAmount,
            "spent_money_id" => $this->spentMoneyId,
            "line_coa_id" => $this->lineCoaId,
        ];
    }
}