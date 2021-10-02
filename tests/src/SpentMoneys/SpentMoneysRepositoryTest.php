<?php

declare(strict_types=1);

namespace Accounting\Tests\SpentMoneys;

use PHPUnit\Framework\TestCase;
use Accounting\Database\DatabaseException;
use Accounting\SpentMoneys\{ SpentMoneysDto, ISpentMoneysRepository, SpentMoneysRepository };

class SpentMoneysRepositoryTest extends TestCase
{
    private $db;
    private $result;
    private array $input;
    private SpentMoneysDto $dto;
    private ISpentMoneysRepository $repository;

    protected function setUp(): void
    {
        $this->db = $this->createMock("Accounting\Database\IDatabase");
        $this->result = $this->createMock("Accounting\Database\IDatabaseResult");
        $this->input = [
            "id" => 4650,
            "tran_date" => "2021-09-25",
            "description" => "Body score Mrs. Difficult court expert. Across alone program night evidence someone.",
            "reference" => "Process travel conference opportunity health speech. Evidence tough activity head through certain education same. Tend even structure chair mouth.",
            "total" => 457.25,
            "supplier_id" => 7130,
            "coa_id" => 1768,
        ];
        $this->dto = new SpentMoneysDto($this->input);
        $this->repository = new SpentMoneysRepository($this->db);
    }

    protected function tearDown(): void
    {
        unset($this->db);
        unset($this->result);
        unset($this->input);
        unset($this->dto);
        unset($this->repository);
    }

    public function testInsert_ReturnsFailedOnException(): void
    {
        $expected = -1;

        $this->db->method("prepare")
            ->will($this->throwException(new DatabaseException()));

        $actual = $this->repository->insert($this->dto);
        $this->assertEquals($expected, $actual);
    }

    public function testInsert_ReturnsId(): void
    {
        $expected = 4689;

        $sql = "INSERT INTO `Spent_Moneys` (`tran_date`, `description`, `reference`, `total`, `supplier_id`, `coa_id`)
                VALUES (?, ?, ?, ?, ?, ?)";

        $this->db->expects($this->once())
            ->method("prepare")
            ->with($sql)
            ->willReturn($this->result);
        $this->result->expects($this->once())
            ->method("execute")
            ->with([
                $this->dto->tranDate,
                $this->dto->description,
                $this->dto->reference,
                $this->dto->total,
                $this->dto->supplierId,
                $this->dto->coaId
            ]);
        $this->db->expects($this->once())
            ->method("lastInsertId")
            ->willReturn($expected);

        $actual = $this->repository->insert($this->dto);
        $this->assertEquals($expected, $actual);
    }

    public function testUpdate_ReturnsFailedOnException(): void
    {
        $expected = -1;

        $this->db->method("prepare")
            ->will($this->throwException(new DatabaseException()));

        $actual = $this->repository->update($this->dto);
        $this->assertEquals($expected, $actual);
    }

    public function testUpdate_ReturnsRowCount(): void
    {
        $expected = 5030;

        $sql = "UPDATE `Spent_Moneys` SET `tran_date` = ?, `description` = ?, `reference` = ?, `total` = ?, `supplier_id` = ?, `coa_id` = ?
                WHERE `id` = ?";

        $this->db->expects($this->once())
            ->method("prepare")
            ->with($sql)
            ->willReturn($this->result);
        $this->result->expects($this->once())
            ->method("execute")
            ->with([
                $this->dto->tranDate,
                $this->dto->description,
                $this->dto->reference,
                $this->dto->total,
                $this->dto->supplierId,
                $this->dto->coaId,
                $this->dto->id
            ]);
        $this->result->expects($this->once())
            ->method("rowCount")
            ->willReturn($expected);

        $actual = $this->repository->update($this->dto);
        $this->assertEquals($expected, $actual);
    }

    public function testGet_ReturnsEmptyOnException(): void
    {
        $id = 8393;

        $this->db->method("prepare")
            ->will($this->throwException(new DatabaseException()));

        $actual = $this->repository->get($id);
        $this->assertEmpty($actual);
    }

    public function testGet_ReturnsDto(): void
    {
        $id = 347;

        $sql = "SELECT `id`, `tran_date`, `description`, `reference`, `total`, `supplier_id`, `coa_id`
                FROM `Spent_Moneys` WHERE `id` = ?";

        $this->db->expects($this->once())
            ->method("prepare")
            ->with($sql)
            ->willReturn($this->result);
        $this->result->expects($this->once())
            ->method("execute")
            ->with([$id]);
        $this->result->expects($this->once())
            ->method("fetchAll")
            ->willReturn([$this->input]);

        $actual = $this->repository->get($id);
        $this->assertEquals($this->dto, $actual);
    }

    public function testGetAll_ReturnsEmptyOnException(): void
    {
        $this->db->method("prepare")
            ->will($this->throwException(new DatabaseException()));

        $actual = $this->repository->getAll();
        $this->assertEmpty($actual);
    }

    public function testGetAll_ReturnsDtos(): void
    {
        $sql = "SELECT `id`, `tran_date`, `description`, `reference`, `total`, `supplier_id`, `coa_id`
                FROM `Spent_Moneys`";

        $this->db->expects($this->once())
            ->method("prepare")
            ->with($sql)
            ->willReturn($this->result);
        $this->result->expects($this->once())
            ->method("execute");
        $this->result->expects($this->once())
            ->method("fetchAll")
            ->willReturn([$this->input]);

        $actual = $this->repository->getAll();
        $this->assertEquals([$this->dto], $actual);
    }

    public function testDelete_ReturnsFailedOnException(): void
    {
        $id = 641;
        $expected = -1;

        $this->db->method("prepare")
            ->will($this->throwException(new DatabaseException()));

        $actual = $this->repository->delete($id);
        $this->assertEquals($expected, $actual);
    }

    public function testDelete_ReturnsRowCount(): void
    {
        $id = 7112;
        $expected = 1260;

        $sql = "DELETE FROM `Spent_Moneys` WHERE `id` = ?";

        $this->db->expects($this->once())
            ->method("prepare")
            ->with($sql)
            ->willReturn($this->result);
        $this->result->expects($this->once())
            ->method("execute")
            ->with([$id]);
        $this->result->expects($this->once())
            ->method("rowCount")
            ->willReturn($expected);

        $actual = $this->repository->delete($id);
        $this->assertEquals($expected, $actual);
    }
}