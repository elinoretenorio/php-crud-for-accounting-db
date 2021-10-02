<?php

declare(strict_types=1);

namespace Accounting\Tests\ReceivedMoneys;

use PHPUnit\Framework\TestCase;
use Accounting\Database\DatabaseException;
use Accounting\ReceivedMoneys\{ ReceivedMoneysDto, IReceivedMoneysRepository, ReceivedMoneysRepository };

class ReceivedMoneysRepositoryTest extends TestCase
{
    private $db;
    private $result;
    private array $input;
    private ReceivedMoneysDto $dto;
    private IReceivedMoneysRepository $repository;

    protected function setUp(): void
    {
        $this->db = $this->createMock("Accounting\Database\IDatabase");
        $this->result = $this->createMock("Accounting\Database\IDatabaseResult");
        $this->input = [
            "id" => 3392,
            "tran_date" => "2021-09-17",
            "description" => "Back trial assume court bring happy Mr. Spring lawyer miss particularly. Heavy could expert age outside.",
            "reference" => "Source evening our few American stock. Find purpose deep year seem entire practice any. Top prepare peace and within half pass.",
            "total" => 485.51,
            "customer_id" => 2568,
            "coa_id" => 2529,
        ];
        $this->dto = new ReceivedMoneysDto($this->input);
        $this->repository = new ReceivedMoneysRepository($this->db);
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
        $expected = 4365;

        $sql = "INSERT INTO `Received_Moneys` (`tran_date`, `description`, `reference`, `total`, `customer_id`, `coa_id`)
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
                $this->dto->customerId,
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
        $expected = 6669;

        $sql = "UPDATE `Received_Moneys` SET `tran_date` = ?, `description` = ?, `reference` = ?, `total` = ?, `customer_id` = ?, `coa_id` = ?
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
                $this->dto->customerId,
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
        $id = 4522;

        $this->db->method("prepare")
            ->will($this->throwException(new DatabaseException()));

        $actual = $this->repository->get($id);
        $this->assertEmpty($actual);
    }

    public function testGet_ReturnsDto(): void
    {
        $id = 852;

        $sql = "SELECT `id`, `tran_date`, `description`, `reference`, `total`, `customer_id`, `coa_id`
                FROM `Received_Moneys` WHERE `id` = ?";

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
        $sql = "SELECT `id`, `tran_date`, `description`, `reference`, `total`, `customer_id`, `coa_id`
                FROM `Received_Moneys`";

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
        $id = 8193;
        $expected = -1;

        $this->db->method("prepare")
            ->will($this->throwException(new DatabaseException()));

        $actual = $this->repository->delete($id);
        $this->assertEquals($expected, $actual);
    }

    public function testDelete_ReturnsRowCount(): void
    {
        $id = 2442;
        $expected = 699;

        $sql = "DELETE FROM `Received_Moneys` WHERE `id` = ?";

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