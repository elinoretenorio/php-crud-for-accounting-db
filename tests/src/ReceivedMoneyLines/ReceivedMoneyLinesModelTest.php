<?php

declare(strict_types=1);

namespace Accounting\Tests\ReceivedMoneyLines;

use PHPUnit\Framework\TestCase;
use Accounting\ReceivedMoneyLines\{ ReceivedMoneyLinesDto, ReceivedMoneyLinesModel };

class ReceivedMoneyLinesModelTest extends TestCase
{
    private array $input;
    private ReceivedMoneyLinesDto $dto;
    private ReceivedMoneyLinesModel $model;

    protected function setUp(): void
    {
        $this->input = [
            "id" => 7856,
            "line_amount" => 191.70,
            "received_money_id" => 9564,
            "line_coa_id" => 5719,
        ];
        $this->dto = new ReceivedMoneyLinesDto($this->input);
        $this->model = new ReceivedMoneyLinesModel($this->dto);
    }

    protected function tearDown(): void
    {
        unset($this->input);
        unset($this->dto);
        unset($this->model);
    }

    public function testModel_ReturnsInstance(): void
    {
        $model = new ReceivedMoneyLinesModel(null);

        $this->assertInstanceOf(ReceivedMoneyLinesModel::class, $model);
    }

    public function testGetId(): void
    {
        $this->assertEquals($this->dto->id, $this->model->getId());
    }

    public function testSetId(): void
    {
        $expected = 1668;
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
        $expected = 69.00;
        $model = $this->model;
        $model->setLineAmount($expected);

        $this->assertEquals($expected, $model->getLineAmount());
    }

    public function testGetReceivedMoneyId(): void
    {
        $this->assertEquals($this->dto->receivedMoneyId, $this->model->getReceivedMoneyId());
    }

    public function testSetReceivedMoneyId(): void
    {
        $expected = 5307;
        $model = $this->model;
        $model->setReceivedMoneyId($expected);

        $this->assertEquals($expected, $model->getReceivedMoneyId());
    }

    public function testGetLineCoaId(): void
    {
        $this->assertEquals($this->dto->lineCoaId, $this->model->getLineCoaId());
    }

    public function testSetLineCoaId(): void
    {
        $expected = 758;
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