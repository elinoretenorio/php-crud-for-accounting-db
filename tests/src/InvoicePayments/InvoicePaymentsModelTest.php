<?php

declare(strict_types=1);

namespace Accounting\Tests\InvoicePayments;

use PHPUnit\Framework\TestCase;
use Accounting\InvoicePayments\{ InvoicePaymentsDto, InvoicePaymentsModel };

class InvoicePaymentsModelTest extends TestCase
{
    private array $input;
    private InvoicePaymentsDto $dto;
    private InvoicePaymentsModel $model;

    protected function setUp(): void
    {
        $this->input = [
            "id" => 8903,
            "tran_date" => "2021-10-07",
            "description" => "Lead indeed day. Business point sort environment smile. Magazine way become read agree nature home. Down training serve over.",
            "reference" => "Fund discover environmental four. Artist hand stay son.",
            "total" => 363.00,
            "coa_id" => 8790,
        ];
        $this->dto = new InvoicePaymentsDto($this->input);
        $this->model = new InvoicePaymentsModel($this->dto);
    }

    protected function tearDown(): void
    {
        unset($this->input);
        unset($this->dto);
        unset($this->model);
    }

    public function testModel_ReturnsInstance(): void
    {
        $model = new InvoicePaymentsModel(null);

        $this->assertInstanceOf(InvoicePaymentsModel::class, $model);
    }

    public function testGetId(): void
    {
        $this->assertEquals($this->dto->id, $this->model->getId());
    }

    public function testSetId(): void
    {
        $expected = 461;
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
        $expected = "2021-09-15";
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
        $expected = "Test since season his democratic alone. Boy do use after often movie.";
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
        $expected = "Baby base line soldier. Would toward type out film soon. Bad rise image project as cause various between.";
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
        $expected = 576.00;
        $model = $this->model;
        $model->setTotal($expected);

        $this->assertEquals($expected, $model->getTotal());
    }

    public function testGetCoaId(): void
    {
        $this->assertEquals($this->dto->coaId, $this->model->getCoaId());
    }

    public function testSetCoaId(): void
    {
        $expected = 8875;
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