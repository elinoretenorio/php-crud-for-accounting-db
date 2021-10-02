<?php

declare(strict_types=1);

namespace Accounting\Tests\Bills;

use PHPUnit\Framework\TestCase;
use Accounting\Bills\{ BillsDto, BillsModel };

class BillsModelTest extends TestCase
{
    private array $input;
    private BillsDto $dto;
    private BillsModel $model;

    protected function setUp(): void
    {
        $this->input = [
            "id" => 950,
            "tran_date" => "2021-09-18",
            "due_date" => "2021-10-03",
            "description" => "Site student land town. While just relationship child couple. Laugh fight admit agreement against key tend fish.",
            "reference" => "A city hour hear building million interest test. Local mind else same network need.",
            "total" => 588.60,
            "status" => True,
            "supplier_id" => 944,
            "bill_payment_id" => 4175,
            "coa_id" => 3921,
        ];
        $this->dto = new BillsDto($this->input);
        $this->model = new BillsModel($this->dto);
    }

    protected function tearDown(): void
    {
        unset($this->input);
        unset($this->dto);
        unset($this->model);
    }

    public function testModel_ReturnsInstance(): void
    {
        $model = new BillsModel(null);

        $this->assertInstanceOf(BillsModel::class, $model);
    }

    public function testGetId(): void
    {
        $this->assertEquals($this->dto->id, $this->model->getId());
    }

    public function testSetId(): void
    {
        $expected = 3691;
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
        $expected = "2021-10-04";
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
        $expected = "2021-10-07";
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
        $expected = "Consider Congress well read member. Simply soldier usually future baby foot. Specific sign walk.";
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
        $expected = "Area move resource. List push agree trouble.";
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
        $expected = 31.14;
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

    public function testGetSupplierId(): void
    {
        $this->assertEquals($this->dto->supplierId, $this->model->getSupplierId());
    }

    public function testSetSupplierId(): void
    {
        $expected = 6643;
        $model = $this->model;
        $model->setSupplierId($expected);

        $this->assertEquals($expected, $model->getSupplierId());
    }

    public function testGetBillPaymentId(): void
    {
        $this->assertEquals($this->dto->billPaymentId, $this->model->getBillPaymentId());
    }

    public function testSetBillPaymentId(): void
    {
        $expected = 3752;
        $model = $this->model;
        $model->setBillPaymentId($expected);

        $this->assertEquals($expected, $model->getBillPaymentId());
    }

    public function testGetCoaId(): void
    {
        $this->assertEquals($this->dto->coaId, $this->model->getCoaId());
    }

    public function testSetCoaId(): void
    {
        $expected = 9926;
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