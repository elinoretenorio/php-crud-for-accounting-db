<?php

declare(strict_types=1);

namespace Accounting\Tests\Invoices;

use PHPUnit\Framework\TestCase;
use Accounting\Invoices\{ InvoicesDto, InvoicesModel };

class InvoicesModelTest extends TestCase
{
    private array $input;
    private InvoicesDto $dto;
    private InvoicesModel $model;

    protected function setUp(): void
    {
        $this->input = [
            "id" => 7221,
            "tran_date" => "2021-09-29",
            "due_date" => "2021-10-06",
            "description" => "Dark draw include especially child fact find. Media instead keep event respond major place.",
            "reference" => "Local positive decision debate. Head wide must push something prove may environmental.",
            "total" => 454.23,
            "status" => False,
            "customer_id" => 49,
            "invoice_payment_id" => 4423,
            "coa_id" => 4220,
        ];
        $this->dto = new InvoicesDto($this->input);
        $this->model = new InvoicesModel($this->dto);
    }

    protected function tearDown(): void
    {
        unset($this->input);
        unset($this->dto);
        unset($this->model);
    }

    public function testModel_ReturnsInstance(): void
    {
        $model = new InvoicesModel(null);

        $this->assertInstanceOf(InvoicesModel::class, $model);
    }

    public function testGetId(): void
    {
        $this->assertEquals($this->dto->id, $this->model->getId());
    }

    public function testSetId(): void
    {
        $expected = 851;
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
        $expected = "2021-09-16";
        $model = $this->model;
        $model->setTranDate($expected);

        $this->assertEquals($expected, $model->getTranDate());
    }

    public function testGetDueDate(): void
    {
        $this->assertEquals($this->dto->dueDate, $this->model->getDueDate());
    }

    public function testSetDueDate(): void
    {
        $expected = "2021-10-11";
        $model = $this->model;
        $model->setDueDate($expected);

        $this->assertEquals($expected, $model->getDueDate());
    }

    public function testGetDescription(): void
    {
        $this->assertEquals($this->dto->description, $this->model->getDescription());
    }

    public function testSetDescription(): void
    {
        $expected = "First wrong agency she.";
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
        $expected = "Enjoy company operation wind which maintain far rather. Name herself early management.";
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
        $expected = 235.25;
        $model = $this->model;
        $model->setTotal($expected);

        $this->assertEquals($expected, $model->getTotal());
    }

    public function testGetStatus(): void
    {
        $this->assertEquals($this->dto->status, $this->model->getStatus());
    }

    public function testSetStatus(): void
    {
        $expected = False;
        $model = $this->model;
        $model->setStatus($expected);

        $this->assertEquals($expected, $model->getStatus());
    }

    public function testGetCustomerId(): void
    {
        $this->assertEquals($this->dto->customerId, $this->model->getCustomerId());
    }

    public function testSetCustomerId(): void
    {
        $expected = 5831;
        $model = $this->model;
        $model->setCustomerId($expected);

        $this->assertEquals($expected, $model->getCustomerId());
    }

    public function testGetInvoicePaymentId(): void
    {
        $this->assertEquals($this->dto->invoicePaymentId, $this->model->getInvoicePaymentId());
    }

    public function testSetInvoicePaymentId(): void
    {
        $expected = 8453;
        $model = $this->model;
        $model->setInvoicePaymentId($expected);

        $this->assertEquals($expected, $model->getInvoicePaymentId());
    }

    public function testGetCoaId(): void
    {
        $this->assertEquals($this->dto->coaId, $this->model->getCoaId());
    }

    public function testSetCoaId(): void
    {
        $expected = 6228;
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