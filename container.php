<?php

declare(strict_types=1);

// Core

$container->add("Pdo", PDO::class)
    ->addArgument("mysql:dbname={$_ENV["DB_NAME"]};host={$_ENV["DB_HOST"]}")
    ->addArgument($_ENV["DB_USER"])
    ->addArgument($_ENV["DB_PASS"])
    ->addArgument([]);
$container->add("Database", Accounting\Database\PdoDatabase::class)
    ->addArgument("Pdo");

// Coa

$container->add("CoaRepository", Accounting\Coa\CoaRepository::class)
    ->addArgument("Database");
$container->add("CoaService", Accounting\Coa\CoaService::class)
    ->addArgument("CoaRepository");
$container->add(Accounting\Coa\CoaController::class)
    ->addArgument("CoaService");

// Customers

$container->add("CustomersRepository", Accounting\Customers\CustomersRepository::class)
    ->addArgument("Database");
$container->add("CustomersService", Accounting\Customers\CustomersService::class)
    ->addArgument("CustomersRepository");
$container->add(Accounting\Customers\CustomersController::class)
    ->addArgument("CustomersService");

// InvoicePayments

$container->add("InvoicePaymentsRepository", Accounting\InvoicePayments\InvoicePaymentsRepository::class)
    ->addArgument("Database");
$container->add("InvoicePaymentsService", Accounting\InvoicePayments\InvoicePaymentsService::class)
    ->addArgument("InvoicePaymentsRepository");
$container->add(Accounting\InvoicePayments\InvoicePaymentsController::class)
    ->addArgument("InvoicePaymentsService");

// Invoices

$container->add("InvoicesRepository", Accounting\Invoices\InvoicesRepository::class)
    ->addArgument("Database");
$container->add("InvoicesService", Accounting\Invoices\InvoicesService::class)
    ->addArgument("InvoicesRepository");
$container->add(Accounting\Invoices\InvoicesController::class)
    ->addArgument("InvoicesService");

// ReceivedMoneys

$container->add("ReceivedMoneysRepository", Accounting\ReceivedMoneys\ReceivedMoneysRepository::class)
    ->addArgument("Database");
$container->add("ReceivedMoneysService", Accounting\ReceivedMoneys\ReceivedMoneysService::class)
    ->addArgument("ReceivedMoneysRepository");
$container->add(Accounting\ReceivedMoneys\ReceivedMoneysController::class)
    ->addArgument("ReceivedMoneysService");

// InvoiceLines

$container->add("InvoiceLinesRepository", Accounting\InvoiceLines\InvoiceLinesRepository::class)
    ->addArgument("Database");
$container->add("InvoiceLinesService", Accounting\InvoiceLines\InvoiceLinesService::class)
    ->addArgument("InvoiceLinesRepository");
$container->add(Accounting\InvoiceLines\InvoiceLinesController::class)
    ->addArgument("InvoiceLinesService");

// ReceivedMoneyLines

$container->add("ReceivedMoneyLinesRepository", Accounting\ReceivedMoneyLines\ReceivedMoneyLinesRepository::class)
    ->addArgument("Database");
$container->add("ReceivedMoneyLinesService", Accounting\ReceivedMoneyLines\ReceivedMoneyLinesService::class)
    ->addArgument("ReceivedMoneyLinesRepository");
$container->add(Accounting\ReceivedMoneyLines\ReceivedMoneyLinesController::class)
    ->addArgument("ReceivedMoneyLinesService");

// Suppliers

$container->add("SuppliersRepository", Accounting\Suppliers\SuppliersRepository::class)
    ->addArgument("Database");
$container->add("SuppliersService", Accounting\Suppliers\SuppliersService::class)
    ->addArgument("SuppliersRepository");
$container->add(Accounting\Suppliers\SuppliersController::class)
    ->addArgument("SuppliersService");

// BillPayments

$container->add("BillPaymentsRepository", Accounting\BillPayments\BillPaymentsRepository::class)
    ->addArgument("Database");
$container->add("BillPaymentsService", Accounting\BillPayments\BillPaymentsService::class)
    ->addArgument("BillPaymentsRepository");
$container->add(Accounting\BillPayments\BillPaymentsController::class)
    ->addArgument("BillPaymentsService");

// Bills

$container->add("BillsRepository", Accounting\Bills\BillsRepository::class)
    ->addArgument("Database");
$container->add("BillsService", Accounting\Bills\BillsService::class)
    ->addArgument("BillsRepository");
$container->add(Accounting\Bills\BillsController::class)
    ->addArgument("BillsService");

// SpentMoneys

$container->add("SpentMoneysRepository", Accounting\SpentMoneys\SpentMoneysRepository::class)
    ->addArgument("Database");
$container->add("SpentMoneysService", Accounting\SpentMoneys\SpentMoneysService::class)
    ->addArgument("SpentMoneysRepository");
$container->add(Accounting\SpentMoneys\SpentMoneysController::class)
    ->addArgument("SpentMoneysService");

// BillLines

$container->add("BillLinesRepository", Accounting\BillLines\BillLinesRepository::class)
    ->addArgument("Database");
$container->add("BillLinesService", Accounting\BillLines\BillLinesService::class)
    ->addArgument("BillLinesRepository");
$container->add(Accounting\BillLines\BillLinesController::class)
    ->addArgument("BillLinesService");

// SpentMoneyLines

$container->add("SpentMoneyLinesRepository", Accounting\SpentMoneyLines\SpentMoneyLinesRepository::class)
    ->addArgument("Database");
$container->add("SpentMoneyLinesService", Accounting\SpentMoneyLines\SpentMoneyLinesService::class)
    ->addArgument("SpentMoneyLinesRepository");
$container->add(Accounting\SpentMoneyLines\SpentMoneyLinesController::class)
    ->addArgument("SpentMoneyLinesService");

