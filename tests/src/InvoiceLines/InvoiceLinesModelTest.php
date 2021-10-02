<?php

declare(strict_types=1);

namespace Accounting\Tests\InvoiceLines;

use PHPUnit\Framework\TestCase;
use Accounting\InvoiceLines\{ InvoiceLinesDto, InvoiceLinesModel };

class InvoiceLinesModelTest extends TestCase
{
    private array $input;
    private InvoiceLinesDto $dto;
    private InvoiceLinesModel $model;

    protected function setUp(): void
    {
        $this->input = [
            "id" => 1543,
            "line_amount" => 824.60,
            "invoice_id" => 8956,
            "line_coa_id" => 4523,
        ];
        $this->dto = new InvoiceLinesDto($this->input);
        $this->model = new InvoiceLinesModel($this->dto);
    }

    protected function tearDown(): void
    {
        unset($this->input);
        unset($this->dto);
        unset($this->model);
    }

    public function testModel_ReturnsInstance(): void
    {
        $model = new InvoiceLinesModel(null);

        $this->assertInstanceOf(InvoiceLinesModel::class, $model);
    }

    public function testGetId(): void
    {
        $this->assertEquals($this->dto->id, $this->model->getId());
    }

    public function testSetId(): void
    {
        $expected = 2913;
        $model = $this->model;
        $model->setId($expected);

        $this->assertEquals($expected, $model->getId());
    }

    public function testGetLineAmount(): void
    {
        $this->assertEquals($this->dto->lineAmount, $this->model->getLineAmount());
    }

    public function testSetLineAmount(): void
    {
        $expected = 818.70;
        $model = $this->model;
        $model->setLineAmount($expected);

        $this->assertEquals($expected, $model->getLineAmount());
    }

    public function testGetInvoiceId(): void
    {
        $this->assertEquals($this->dto->invoiceId, $this->model->getInvoiceId());
    }

    public function testSetInvoiceId(): void
    {
        $expected = 5095;
        $model = $this->model;
        $model->setInvoiceId($expected);

        $this->assertEquals($expected, $model->getInvoiceId());
    }

    public function testGetLineCoaId(): void
    {
        $this->assertEquals($this->dto->lineCoaId, $this->model->getLineCoaId());
    }

    public function testSetLineCoaId(): void
    {
        $expected = 8282;
        $model = $this->model;
        $model->setLineCoaId($expected);

        $this->assertEquals($expected, $model->getLineCoaId());
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