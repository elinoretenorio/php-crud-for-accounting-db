<?php

declare(strict_types=1);

namespace Accounting\Customers;

class CustomersDto 
{
    public int $id;
    public string $name;
    public string $contactPerson;
    public string $email;
    public string $phone;
    public string $fax;
    public string $address;

    public function __construct(array $row = null)
    {
        if ($row === null) {
            return;
        }

        $this->id = (int) ($row["id"] ?? 0);
        $this->name = $row["name"] ?? "";
        $this->contactPerson = $row["contact_person"] ?? "";
        $this->email = $row["email"] ?? "";
        $this->phone = $row["phone"] ?? "";
        $this->fax = $row["fax"] ?? "";
        $this->address = $row["address"] ?? "";
    }
}