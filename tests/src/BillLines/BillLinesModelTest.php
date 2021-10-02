<?php

declare(strict_types=1);

namespace Accounting\Tests\BillLines;

use PHPUnit\Framework\TestCase;
use Accounting\BillLines\{ BillLinesDto, BillLinesModel };

class BillLinesModelTest extends TestCase
{
    private array $input;
    private BillLinesDto $dto;
    private BillLinesModel $model;

    protected function setUp(): void
    {
        $this->input = [
            "id" => 6981,
            "line_amount" => 169.15,
            "bill_id" => 9884,
            "line_coa_id" => 9132,
        ];
        $this->dto = new BillLinesDto($this->input);
        $this->model = new BillLinesModel($this->dto);
    }

    protected function tearDown(): void
    {
        unset($this->input);
        unset($this->dto);
        unset($this->model);
    }

    public function testModel_ReturnsInstance(): void
    {
        $model = new BillLinesModel(null);

        $this->assertInstanceOf(BillLinesModel::class, $model);
    }

    public function testGetId(): void
    {
        $this->assertEquals($this->dto->id, $this->model->getId());
    }

    public function testSetId(): void
    {
        $expected = 6663;
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
        $expected = 901.80;
        $model = $this->model;
        $model->setLineAmount($expected);

        $this->assertEquals($expected, $model->getLineAmount());
    }

    public function testGetBillId(): void
    {
        $this->assertEquals($this->dto->billId, $this->model->getBillId());
    }

    public function testSetBillId(): void
    {
        $expected = 9023;
        $model = $this->model;
        $model->setBillId($expected);

        $this->assertEquals($expected, $model->getBillId());
    }

    public function testGetLineCoaId(): void
    {
        $this->assertEquals($this->dto->lineCoaId, $this->model->getLineCoaId());
    }

    public function testSetLineCoaId(): void
    {
        $expected = 5549;
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