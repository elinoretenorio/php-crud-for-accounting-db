<?php

declare(strict_types=1);

namespace Accounting\Tests\SpentMoneyLines;

use PHPUnit\Framework\TestCase;
use Accounting\SpentMoneyLines\{ SpentMoneyLinesDto, SpentMoneyLinesModel };

class SpentMoneyLinesModelTest extends TestCase
{
    private array $input;
    private SpentMoneyLinesDto $dto;
    private SpentMoneyLinesModel $model;

    protected function setUp(): void
    {
        $this->input = [
            "id" => 3940,
            "line_amount" => 682.79,
            "spent_money_id" => 4922,
            "line_coa_id" => 6237,
        ];
        $this->dto = new SpentMoneyLinesDto($this->input);
        $this->model = new SpentMoneyLinesModel($this->dto);
    }

    protected function tearDown(): void
    {
        unset($this->input);
        unset($this->dto);
        unset($this->model);
    }

    public function testModel_ReturnsInstance(): void
    {
        $model = new SpentMoneyLinesModel(null);

        $this->assertInstanceOf(SpentMoneyLinesModel::class, $model);
    }

    public function testGetId(): void
    {
        $this->assertEquals($this->dto->id, $this->model->getId());
    }

    public function testSetId(): void
    {
        $expected = 628;
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
        $expected = 199.00;
        $model = $this->model;
        $model->setLineAmount($expected);

        $this->assertEquals($expected, $model->getLineAmount());
    }

    public function testGetSpentMoneyId(): void
    {
        $this->assertEquals($this->dto->spentMoneyId, $this->model->getSpentMoneyId());
    }

    public function testSetSpentMoneyId(): void
    {
        $expected = 4529;
        $model = $this->model;
        $model->setSpentMoneyId($expected);

        $this->assertEquals($expected, $model->getSpentMoneyId());
    }

    public function testGetLineCoaId(): void
    {
        $this->assertEquals($this->dto->lineCoaId, $this->model->getLineCoaId());
    }

    public function testSetLineCoaId(): void
    {
        $expected = 2837;
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