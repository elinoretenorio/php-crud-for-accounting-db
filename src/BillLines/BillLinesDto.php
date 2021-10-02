<?php

declare(strict_types=1);

namespace Accounting\BillLines;

class BillLinesDto 
{
    public int $id;
    public float $lineAmount;
    public int $billId;
    public int $lineCoaId;

    public function __construct(array $row = null)
    {
        if ($row === null) {
            return;
        }

        $this->id = (int) ($row["id"] ?? 0);
        $this->lineAmount = (float) ($row["line_amount"] ?? 0);
        $this->billId = (int) ($row["bill_id"] ?? 0);
        $this->lineCoaId = (int) ($row["line_coa_id"] ?? 0);
    }
}