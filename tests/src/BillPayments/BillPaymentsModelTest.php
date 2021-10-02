<?php

declare(strict_types=1);

namespace Accounting\Tests\BillPayments;

use PHPUnit\Framework\TestCase;
use Accounting\BillPayments\{ BillPaymentsDto, BillPaymentsModel };

class BillPaymentsModelTest extends TestCase
{
    private array $input;
    private BillPaymentsDto $dto;
    private BillPaymentsModel $model;

    protected function setUp(): void
    {
        $this->input = [
            "id" => 1476,
            "tran_date" => "2021-10-09",
            "description" => "Majority marriage act walk during speech. Job form benefit board such tell. Upon by attention idea money news bit world. Agent start back couple concern.",
            "reference" => "Human yourself attention discussion million attention result. Central green Mr however.",
            "total" => 636.18,
            "coa_id" => 1007,
        ];
        $this->dto = new BillPaymentsDto($this->input);
        $this->model = new BillPaymentsModel($this->dto);
    }

    protected function tearDown(): void
    {
        unset($this->input);
        unset($this->dto);
        unset($this->model);
    }

    public function testModel_ReturnsInstance(): void
    {
        $model = new BillPaymentsModel(null);

        $this->assertInstanceOf(BillPaymentsModel::class, $model);
    }

    public function testGetId(): void
    {
        $this->assertEquals($this->dto->id, $this->model->getId());
    }

    public function testSetId(): void
    {
        $expected = 1669;
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
        $expected = "2021-09-28";
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
        $expected = "Own collection majority fish face capital top. Ago environment hundred decade season travel generation.";
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
        $expected = "Lose he month physical wrong.";
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
        $expected = 544.56;
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
        $expected = 2670;
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