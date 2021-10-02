<?php

declare(strict_types=1);

namespace Accounting\Bills;

class BillsDto 
{
    public int $id;
    public string $tranDate;
    public string $dueDate;
    public string $description;
    public string $reference;
    public float $total;
    public bool $status;
    public int $supplierId;
    public int $billPaymentId;
    public int $coaId;

    public function __construct(array $row = null)
    {
        if ($row === null) {
            return;
        }

        $this->id = (int) ($row["id"] ?? 0);
        $this->tranDate = $row["tran_date"] ?? "";
        $this->dueDate = $row["due_date"] ?? "";
        $this->description = $row["description"] ?? "";
        $this->reference = $row["reference"] ?? "";
        $this->total = (float) ($row["total"] ?? 0);
        $this->status = (bool) $row["status"];
        $this->supplierId = (int) ($row["supplier_id"] ?? 0);
        $this->billPaymentId = (int) ($row["bill_payment_id"] ?? 0);
        $this->coaId = (int) ($row["coa_id"] ?? 0);
    }
}