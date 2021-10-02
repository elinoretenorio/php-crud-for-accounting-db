<?php

declare(strict_types=1);

namespace Accounting\Tests\Invoices;

use PHPUnit\Framework\TestCase;
use Accounting\Database\DatabaseException;
use Accounting\Invoices\{ InvoicesDto, IInvoicesRepository, InvoicesRepository };

class InvoicesRepositoryTest extends TestCase
{
    private $db;
    private $result;
    private array $input;
    private InvoicesDto $dto;
    private IInvoicesRepository $repository;

    protected function setUp(): void
    {
        $this->db = $this->createMock("Accounting\Database\IDatabase");
        $this->result = $this->createMock("Accounting\Database\IDatabaseResult");
        $this->input = [
            "id" => 9280,
            "tran_date" => "2021-09-26",
            "due_date" => "2021-09-28",
            "description" => "Black just forget source some. Place age across consider. Lay top other single sea.",
            "reference" => "Campaign choice article middle. Affect couple indicate north together whatever idea letter.",
            "total" => 232.00,
            "status" => False,
            "customer_id" => 4092,
            "invoice_payment_id" => 9018,
            "coa_id" => 5959,
        ];
        $this->dto = new InvoicesDto($this->input);
        $this->repository = new InvoicesRepository($this->db);
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
        $expected = 6732;

        $sql = "INSERT INTO `Invoices` (`tran_date`, `due_date`, `description`, `reference`, `total`, `status`, `customer_id`, `invoice_payment_id`, `coa_id`)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $this->db->expects($this->once())
            ->method("prepare")
            ->with($sql)
            ->willReturn($this->result);
        $this->result->expects($this->once())
            ->method("execute")
            ->with([
                $this->dto->tranDate,
                $this->dto->dueDate,
                $this->dto->description,
                $this->dto->reference,
                $this->dto->total,
                $this->dto->status,
                $this->dto->customerId,
                $this->dto->invoicePaymentId,
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
        $expected = 3718;

        $sql = "UPDATE `Invoices` SET `tran_date` = ?, `due_date` = ?, `description` = ?, `reference` = ?, `total` = ?, `status` = ?, `customer_id` = ?, `invoice_payment_id` = ?, `coa_id` = ?
                WHERE `id` = ?";

        $this->db->expects($this->once())
            ->method("prepare")
            ->with($sql)
            ->willReturn($this->result);
        $this->result->expects($this->once())
            ->method("execute")
            ->with([
                $this->dto->tranDate,
                $this->dto->dueDate,
                $this->dto->description,
                $this->dto->reference,
                $this->dto->total,
                $this->dto->status,
                $this->dto->customerId,
                $this->dto->invoicePaymentId,
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
        $id = 6722;

        $this->db->method("prepare")
            ->will($this->throwException(new DatabaseException()));

        $actual = $this->repository->get($id);
        $this->assertEmpty($actual);
    }

    public function testGet_ReturnsDto(): void
    {
        $id = 2800;

        $sql = "SELECT `id`, `tran_date`, `due_date`, `description`, `reference`, `total`, `status`, `customer_id`, `invoice_payment_id`, `coa_id`
                FROM `Invoices` WHERE `id` = ?";

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
        $sql = "SELECT `id`, `tran_date`, `due_date`, `description`, `reference`, `total`, `status`, `customer_id`, `invoice_payment_id`, `coa_id`
                FROM `Invoices`";

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
        $id = 42;
        $expected = -1;

        $this->db->method("prepare")
            ->will($this->throwException(new DatabaseException()));

        $actual = $this->repository->delete($id);
        $this->assertEquals($expected, $actual);
    }

    public function testDelete_ReturnsRowCount(): void
    {
        $id = 5326;
        $expected = 911;

        $sql = "DELETE FROM `Invoices` WHERE `id` = ?";

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