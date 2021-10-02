<?php

declare(strict_types=1);

namespace Accounting\Tests\Customers;

use PHPUnit\Framework\TestCase;
use Accounting\Customers\{ CustomersDto, CustomersModel };

class CustomersModelTest extends TestCase
{
    private array $input;
    private CustomersDto $dto;
    private CustomersModel $model;

    protected function setUp(): void
    {
        $this->input = [
            "id" => 3026,
            "name" => "Teacher figure begin nor. Marriage trip policy southern sell unit. Color should direction start place opportunity even think.",
            "contact_person" => "Remain community protect theory happen continue military. Director value media number modern know force.",
            "email" => "victoria89@example.net",
            "phone" => "Property evidence page discussion traditional. Tonight kitchen for PM.",
            "fax" => "Money full identify side body pick. Program each short yes save our race term. Song science American court peace read very.",
            "address" => "Sense bag fly go. From administration between yard. His camera herself system.",
        ];
        $this->dto = new CustomersDto($this->input);
        $this->model = new CustomersModel($this->dto);
    }

    protected function tearDown(): void
    {
        unset($this->input);
        unset($this->dto);
        unset($this->model);
    }

    public function testModel_ReturnsInstance(): void
    {
        $model = new CustomersModel(null);

        $this->assertInstanceOf(CustomersModel::class, $model);
    }

    public function testGetId(): void
    {
        $this->assertEquals($this->dto->id, $this->model->getId());
    }

    public function testSetId(): void
    {
        $expected = 445;
        $model = $this->model;
        $model->setId($expected);

        $this->assertEquals($expected, $model->getId());
    }

    public function testGetName(): void
    {
        $this->assertEquals($this->dto->name, $this->model->getName());
    }

    public function testSetName(): void
    {
        $expected = "Eat return administration name compare although.";
        $model = $this->model;
        $model->setName($expected);

        $this->assertEquals($expected, $model->getName());
    }

    public function testGetContactPerson(): void
    {
        $this->assertEquals($this->dto->contactPerson, $this->model->getContactPerson());
    }

    public function testSetContactPerson(): void
    {
        $expected = "She before a story. Responsibility sit reality whether wind.";
        $model = $this->model;
        $model->setContactPerson($expected);

        $this->assertEquals($expected, $model->getContactPerson());
    }

    public function testGetEmail(): void
    {
        $this->assertEquals($this->dto->email, $this->model->getEmail());
    }

    public function testSetEmail(): void
    {
        $expected = "roger73@example.com";
        $model = $this->model;
        $model->setEmail($expected);

        $this->assertEquals($expected, $model->getEmail());
    }

    public function testGetPhone(): void
    {
        $this->assertEquals($this->dto->phone, $this->model->getPhone());
    }

    public function testSetPhone(): void
    {
        $expected = "Article through lead draw significant along. Cup enter always mean establish ever.";
        $model = $this->model;
        $model->setPhone($expected);

        $this->assertEquals($expected, $model->getPhone());
    }

    public function testGetFax(): void
    {
        $this->assertEquals($this->dto->fax, $this->model->getFax());
    }

    public function testSetFax(): void
    {
        $expected = "Together participant idea level anyone operation art. Offer long actually gun society inside. Off kind onto his financial.";
        $model = $this->model;
        $model->setFax($expected);

        $this->assertEquals($expected, $model->getFax());
    }

    public function testGetAddress(): void
    {
        $this->assertEquals($this->dto->address, $this->model->getAddress());
    }

    public function testSetAddress(): void
    {
        $expected = "Year walk maybe believe anything majority.";
        $model = $this->model;
        $model->setAddress($expected);

        $this->assertEquals($expected, $model->getAddress());
    }

    public function testToDto(): void
    {
        $this->assertEquals($this->dto, $this->model->toDto());
    }

    public function testJsonSerialize(): void
    {
        $this->assertEquals($this->input, $this->model->jsonSerialize());
    }
}