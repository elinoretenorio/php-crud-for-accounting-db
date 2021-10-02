<?php

declare(strict_types=1);

namespace Accounting\Customers;

use JsonSerializable;

class CustomersModel implements JsonSerializable
{
    private int $id;
    private string $name;
    private string $contactPerson;
    private string $email;
    private string $phone;
    private string $fax;
    private string $address;

    public function __construct(CustomersDto $dto = null)
    {
        if ($dto === null) {
            return;
        }

        $this->id = $dto->id;
        $this->name = $dto->name;
        $this->contactPerson = $dto->contactPerson;
        $this->email = $dto->email;
        $this->phone = $dto->phone;
        $this->fax = $dto->fax;
        $this->address = $dto->address;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getContactPerson(): string
    {
        return $this->contactPerson;
    }

    public function setContactPerson(string $contactPerson): void
    {
        $this->contactPerson = $contactPerson;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }

    public function getFax(): string
    {
        return $this->fax;
    }

    public function setFax(string $fax): void
    {
        $this->fax = $fax;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    public function toDto(): CustomersDto
    {
        $dto = new CustomersDto();
        $dto->id = (int) ($this->id ?? 0);
        $dto->name = $this->name ?? "";
        $dto->contactPerson = $this->contactPerson ?? "";
        $dto->email = $this->email ?? "";
        $dto->phone = $this->phone ?? "";
        $dto->fax = $this->fax ?? "";
        $dto->address = $this->address ?? "";

        return $dto;
    }

    public function jsonSerialize(): array
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "contact_person" => $this->contactPerson,
            "email" => $this->email,
            "phone" => $this->phone,
            "fax" => $this->fax,
            "address" => $this->address,
        ];
    }
}