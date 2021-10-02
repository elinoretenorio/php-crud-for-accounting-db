<?php

declare(strict_types=1);

namespace Accounting\ReceivedMoneyLines;

class ReceivedMoneyLinesDto 
{
    public int $id;
    public float $lineAmount;
    public int $receivedMoneyId;
    public int $lineCoaId;

    public function __construct(array $row = null)
    {
        if ($row === null) {
            return;
        }

        $this->id = (int) ($row["id"] ?? 0);
        $this->lineAmount = (float) ($row["line_amount"] ?? 0);
        $this->receivedMoneyId = (int) ($row["received_money_id"] ?? 0);
        $this->lineCoaId = (int) ($row["line_coa_id"] ?? 0);
    }
}