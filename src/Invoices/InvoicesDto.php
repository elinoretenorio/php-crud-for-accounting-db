<?php

declare(strict_types=1);

namespace Accounting\Invoices;

class InvoicesDto 
{
    public int $id;
    public string $tranDate;
    public string $dueDate;
    public string $description;
    public string $reference;
    public float $total;
    public bool $status;
    public int $customerId;
    public int $invoicePaymentId;
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
        $this->customerId = (int) ($row["customer_id"] ?? 0);
        $this->invoicePaymentId = (int) ($row["invoice_payment_id"] ?? 0);
        $this->coaId = (int) ($row["coa_id"] ?? 0);
    }
}