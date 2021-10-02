<?php

declare(strict_types=1);

namespace Accounting\SpentMoneys;

class SpentMoneysDto 
{
    public int $id;
    public string $tranDate;
    public string $description;
    public string $reference;
    public float $total;
    public int $supplierId;
    public int $coaId;

    public function __construct(array $row = null)
    {
        if ($row === null) {
            return;
        }

        $this->id = (int) ($row["id"] ?? 0);
        $this->tranDate = $row["tran_date"] ?? "";
        $this->description = $row["description"] ?? "";
        $this->reference = $row["reference"] ?? "";
        $this->total = (float) ($row["total"] ?? 0);
        $this->supplierId = (int) ($row["supplier_id"] ?? 0);
        $this->coaId = (int) ($row["coa_id"] ?? 0);
    }
}