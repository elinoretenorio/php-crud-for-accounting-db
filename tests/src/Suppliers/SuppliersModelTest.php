<?php

declare(strict_types=1);

namespace Accounting\Tests\Suppliers;

use PHPUnit\Framework\TestCase;
use Accounting\Suppliers\{ SuppliersDto, SuppliersModel };

class SuppliersModelTest extends TestCase
{
    private array $input;
    private SuppliersDto $dto;
    private SuppliersModel $model;

    protected function setUp(): void
    {
        $this->input = [
            "id" => 6974,
            "name" => "Could person machine response.",
            "contact_person" => "Whom whatever throughout fill beat. Free across across role party finally.",
            "email" => "paul62@example.com",
            "phone" => "Dream this letter with major college may. Carry help available generation trouble wait through. While issue process candidate.",
            "fax" => "Country effort live Democrat during. Serve friend choose serve south.",
            "address" => "Argue push increase left yard. Use certainly bill window themselves think one.",
        ];
        $this->dto = new SuppliersDto($this->input);
        $this->model = new SuppliersModel($this->dto);
    }

    protected function tearDown(): void
    {
        unset($this->input);
        unset($this->dto);
        unset($this->model);
    }

    public function testModel_ReturnsInstance(): void
    {
        $model = new SuppliersModel(null);

        $this->assertInstanceOf(SuppliersModel::class, $model);
    }

    public function testGetId(): void
    {
        $this->assertEquals($this->dto->id, $this->model->getId());
    }

    public function testSetId(): void
    {
        $expected = 3338;
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
        $expected = "General baby not over. Speech central special others.";
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
        $expected = "Turn page several about board. Individual window seem compare.";
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
        $expected = "zperry@example.com";
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
        $expected = "Without move letter follow our wear result policy. Threat husband matter professional white focus. Position information subject around race teacher. Piece student in lay which avoid.";
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
        $expected = "Popular dinner next.";
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
        $expected = "Section where writer wife buy up trade tell. Win goal light cup. Hair account partner.";
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