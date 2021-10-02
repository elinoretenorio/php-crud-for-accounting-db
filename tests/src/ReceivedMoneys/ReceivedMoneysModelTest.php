<?php

declare(strict_types=1);

namespace Accounting\Tests\ReceivedMoneys;

use PHPUnit\Framework\TestCase;
use Accounting\ReceivedMoneys\{ ReceivedMoneysDto, ReceivedMoneysModel };

class ReceivedMoneysModelTest extends TestCase
{
    private array $input;
    private ReceivedMoneysDto $dto;
    private ReceivedMoneysModel $model;

    protected function setUp(): void
    {
        $this->input = [
            "id" => 5824,
            "tran_date" => "2021-09-25",
            "description" => "Affect himself market Congress book. Happen third return use word.",
            "reference" => "Allow us upon including help page. Material audience trade provide responsibility interest seek. Attention information leader moment instead.",
            "total" => 78.14,
            "customer_id" => 2602,
            "coa_id" => 6848,
        ];
        $this->dto = new ReceivedMoneysDto($this->input);
        $this->model = new ReceivedMoneysModel($this->dto);
    }

    protected function tearDown(): void
    {
        unset($this->input);
        unset($this->dto);
        unset($this->model);
    }

    public function testModel_ReturnsInstance(): void
    {
        $model = new ReceivedMoneysModel(null);

        $this->assertInstanceOf(ReceivedMoneysModel::class, $model);
    }

    public function testGetId(): void
    {
        $this->assertEquals($this->dto->id, $this->model->getId());
    }

    public function testSetId(): void
    {
        $expected = 3697;
        $model = $this->model;
        $model->setId($expected);

        $this->assertEquals($expected, $model->getId());
    }

    public function testGetTranDate(): void
    {
        $this->assertEquals($this->dto->tranDate, $this->model->getTranDate());
    }

    public function testSetTranDate(): void
    {
        $expected = "2021-09-26";
        $model = $this->model;
        $model->setTranDate($expected);

        $this->assertEquals($expected, $model->getTranDate());
    }

    public function testGetDescription(): void
    {
        $this->assertEquals($this->dto->description, $this->model->getDescription());
    }

    public function testSetDescription(): void
    {
        $expected = "That view blood late. Especially everything back moment again produce scene.";
        $model = $this->model;
        $model->setDescription($expected);

        $this->assertEquals($expected, $model->getDescription());
    }

    public function testGetReference(): void
    {
        $this->assertEquals($this->dto->reference, $this->model->getReference());
    }

    public function testSetReference(): void
    {
        $expected = "Sound staff choose appear military fight past. Explain left cause book after whether.";
        $model = $this->model;
        $model->setReference($expected);

        $this->assertEquals($expected, $model->getReference());
    }

    public function testGetTotal(): void
    {
        $this->assertEquals($this->dto->total, $this->model->getTotal());
    }

    public function testSetTotal(): void
    {
        $expected = 471.00;
        $model = $this->model;
        $model->setTotal($expected);

        $this->assertEquals($expected, $model->getTotal());
    }

    public function testGetCustomerId(): void
    {
        $this->assertEquals($this->dto->customerId, $this->model->getCustomerId());
    }

    public function testSetCustomerId(): void
    {
        $expected = 7764;
        $model = $this->model;
        $model->setCustomerId($expected);

        $this->assertEquals($expected, $model->getCustomerId());
    }

    public function testGetCoaId(): void
    {
        $this->assertEquals($this->dto->coaId, $this->model->getCoaId());
    }

    public function testSetCoaId(): void
    {
        $expected = 9064;
        $model = $this->model;
        $model->setCoaId($expected);

        $this->assertEquals($expected, $model->getCoaId());
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