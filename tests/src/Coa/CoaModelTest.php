<?php

declare(strict_types=1);

namespace Accounting\Tests\Coa;

use PHPUnit\Framework\TestCase;
use Accounting\Coa\{ CoaDto, CoaModel };

class CoaModelTest extends TestCase
{
    private array $input;
    private CoaDto $dto;
    private CoaModel $model;

    protected function setUp(): void
    {
        $this->input = [
            "id" => 6561,
            "name" => "Better down hold. Probably mind entire law. Put here security thing arm.",
        ];
        $this->dto = new CoaDto($this->input);
        $this->model = new CoaModel($this->dto);
    }

    protected function tearDown(): void
    {
        unset($this->input);
        unset($this->dto);
        unset($this->model);
    }

    public function testModel_ReturnsInstance(): void
    {
        $model = new CoaModel(null);

        $this->assertInstanceOf(CoaModel::class, $model);
    }

    public function testGetId(): void
    {
        $this->assertEquals($this->dto->id, $this->model->getId());
    }

    public function testSetId(): void
    {
        $expected = 4643;
        $model = $this->model;
        $model->setId($expected);

        $this->assertEquals($expected, $model->getId());
    }

    public function testGetName(): void
    {
        $this->assertEquals($this->dto->name, $this->model->getName());
    }

    public function testSetName(): void
    {
        $expected = "Marriage throughout include three goal gun win. Nice every check hand so remain door.";
        $model = $this->model;
        $model->setName($expected);

        $this->assertEquals($expected, $model->getName());
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