<?php

declare(strict_types=1);

namespace Accounting\Tests\SpentMoneys;

use PHPUnit\Framework\TestCase;
use Accounting\SpentMoneys\{ SpentMoneysDto, SpentMoneysModel };

class SpentMoneysModelTest extends TestCase
{
    private array $input;
    private SpentMoneysDto $dto;
    private SpentMoneysModel $model;

    protected function setUp(): void
    {
        $this->input = [
            "id" => 1558,
            "tran_date" => "2021-10-09",
            "description" => "Do technology him nation anything official. Agent generation book.",
            "reference" => "Show oil reality especially money. Sound popular their teacher surface section. Beat place work beyond it.",
            "total" => 993.21,
            "supplier_id" => 8087,
            "coa_id" => 5728,
        ];
        $this->dto = new SpentMoneysDto($this->input);
        $this->model = new SpentMoneysModel($this->dto);
    }

    protected function tearDown(): void
    {
        unset($this->input);
        unset($this->dto);
        unset($this->model);
    }

    public function testModel_ReturnsInstance(): void
    {
        $model = new SpentMoneysModel(null);

        $this->assertInstanceOf(SpentMoneysModel::class, $model);
    }

    public function testGetId(): void
    {
        $this->assertEquals($this->dto->id, $this->model->getId());
    }

    public function testSetId(): void
    {
        $expected = 8828;
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
        $expected = "2021-10-02";
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
        $expected = "House particular stop war wear member might. Defense firm late meeting loss color. Professional you charge according too six new.";
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
        $expected = "Wish involve describe instead. New class couple. From conference language.";
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
        $expected = 106.45;
        $model = $this->model;
        $model->setTotal($expected);

        $this->assertEquals($expected, $model->getTotal());
    }

    public function testGetSupplierId(): void
    {
        $this->assertEquals($this->dto->supplierId, $this->model->getSupplierId());
    }

    public function testSetSupplierId(): void
    {
        $expected = 3582;
        $model = $this->model;
        $model->setSupplierId($expected);

        $this->assertEquals($expected, $model->getSupplierId());
    }

    public function testGetCoaId(): void
    {
        $this->assertEquals($this->dto->coaId, $this->model->getCoaId());
    }

    public function testSetCoaId(): void
    {
        $expected = 6848;
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