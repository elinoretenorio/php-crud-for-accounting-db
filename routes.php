<?php

declare(strict_types=1);

$router->get("/coa", "Accounting\Coa\CoaController::getAll");
$router->post("/coa", "Accounting\Coa\CoaController::insert");
$router->group("/coa", function ($router) {
    $router->get("/{id:number}", "Accounting\Coa\CoaController::get");
    $router->post("/{id:number}", "Accounting\Coa\CoaController::update");
    $router->delete("/{id:number}", "Accounting\Coa\CoaController::delete");
});

$router->get("/customers", "Accounting\Customers\CustomersController::getAll");
$router->post("/customers", "Accounting\Customers\CustomersController::insert");
$router->group("/customers", function ($router) {
    $router->get("/{id:number}", "Accounting\Customers\CustomersController::get");
    $router->post("/{id:number}", "Accounting\Customers\CustomersController::update");
    $router->delete("/{id:number}", "Accounting\Customers\CustomersController::delete");
});

$router->get("/invoice-payments", "Accounting\InvoicePayments\InvoicePaymentsController::getAll");
$router->post("/invoice-payments", "Accounting\InvoicePayments\InvoicePaymentsController::insert");
$router->group("/invoice-payments", function ($router) {
    $router->get("/{id:number}", "Accounting\InvoicePayments\InvoicePaymentsController::get");
    $router->post("/{id:number}", "Accounting\InvoicePayments\InvoicePaymentsController::update");
    $router->delete("/{id:number}", "Accounting\InvoicePayments\InvoicePaymentsController::delete");
});

$router->get("/invoices", "Accounting\Invoices\InvoicesController::getAll");
$router->post("/invoices", "Accounting\Invoices\InvoicesController::insert");
$router->group("/invoices", function ($router) {
    $router->get("/{id:number}", "Accounting\Invoices\InvoicesController::get");
    $router->post("/{id:number}", "Accounting\Invoices\InvoicesController::update");
    $router->delete("/{id:number}", "Accounting\Invoices\InvoicesController::delete");
});

$router->get("/received-moneys", "Accounting\ReceivedMoneys\ReceivedMoneysController::getAll");
$router->post("/received-moneys", "Accounting\ReceivedMoneys\ReceivedMoneysController::insert");
$router->group("/received-moneys", function ($router) {
    $router->get("/{id:number}", "Accounting\ReceivedMoneys\ReceivedMoneysController::get");
    $router->post("/{id:number}", "Accounting\ReceivedMoneys\ReceivedMoneysController::update");
    $router->delete("/{id:number}", "Accounting\ReceivedMoneys\ReceivedMoneysController::delete");
});

$router->get("/invoice-lines", "Accounting\InvoiceLines\InvoiceLinesController::getAll");
$router->post("/invoice-lines", "Accounting\InvoiceLines\InvoiceLinesController::insert");
$router->group("/invoice-lines", function ($router) {
    $router->get("/{id:number}", "Accounting\InvoiceLines\InvoiceLinesController::get");
    $router->post("/{id:number}", "Accounting\InvoiceLines\InvoiceLinesController::update");
    $router->delete("/{id:number}", "Accounting\InvoiceLines\InvoiceLinesController::delete");
});

$router->get("/received-money-lines", "Accounting\ReceivedMoneyLines\ReceivedMoneyLinesController::getAll");
$router->post("/received-money-lines", "Accounting\ReceivedMoneyLines\ReceivedMoneyLinesController::insert");
$router->group("/received-money-lines", function ($router) {
    $router->get("/{id:number}", "Accounting\ReceivedMoneyLines\ReceivedMoneyLinesController::get");
    $router->post("/{id:number}", "Accounting\ReceivedMoneyLines\ReceivedMoneyLinesController::update");
    $router->delete("/{id:number}", "Accounting\ReceivedMoneyLines\ReceivedMoneyLinesController::delete");
});

$router->get("/suppliers", "Accounting\Suppliers\SuppliersController::getAll");
$router->post("/suppliers", "Accounting\Suppliers\SuppliersController::insert");
$router->group("/suppliers", function ($router) {
    $router->get("/{id:number}", "Accounting\Suppliers\SuppliersController::get");
    $router->post("/{id:number}", "Accounting\Suppliers\SuppliersController::update");
    $router->delete("/{id:number}", "Accounting\Suppliers\SuppliersController::delete");
});

$router->get("/bill-payments", "Accounting\BillPayments\BillPaymentsController::getAll");
$router->post("/bill-payments", "Accounting\BillPayments\BillPaymentsController::insert");
$router->group("/bill-payments", function ($router) {
    $router->get("/{id:number}", "Accounting\BillPayments\BillPaymentsController::get");
    $router->post("/{id:number}", "Accounting\BillPayments\BillPaymentsController::update");
    $router->delete("/{id:number}", "Accounting\BillPayments\BillPaymentsController::delete");
});

$router->get("/bills", "Accounting\Bills\BillsController::getAll");
$router->post("/bills", "Accounting\Bills\BillsController::insert");
$router->group("/bills", function ($router) {
    $router->get("/{id:number}", "Accounting\Bills\BillsController::get");
    $router->post("/{id:number}", "Accounting\Bills\BillsController::update");
    $router->delete("/{id:number}", "Accounting\Bills\BillsController::delete");
});

$router->get("/spent-moneys", "Accounting\SpentMoneys\SpentMoneysController::getAll");
$router->post("/spent-moneys", "Accounting\SpentMoneys\SpentMoneysController::insert");
$router->group("/spent-moneys", function ($router) {
    $router->get("/{id:number}", "Accounting\SpentMoneys\SpentMoneysController::get");
    $router->post("/{id:number}", "Accounting\SpentMoneys\SpentMoneysController::update");
    $router->delete("/{id:number}", "Accounting\SpentMoneys\SpentMoneysController::delete");
});

$router->get("/bill-lines", "Accounting\BillLines\BillLinesController::getAll");
$router->post("/bill-lines", "Accounting\BillLines\BillLinesController::insert");
$router->group("/bill-lines", function ($router) {
    $router->get("/{id:number}", "Accounting\BillLines\BillLinesController::get");
    $router->post("/{id:number}", "Accounting\BillLines\BillLinesController::update");
    $router->delete("/{id:number}", "Accounting\BillLines\BillLinesController::delete");
});

$router->get("/spent-money-lines", "Accounting\SpentMoneyLines\SpentMoneyLinesController::getAll");
$router->post("/spent-money-lines", "Accounting\SpentMoneyLines\SpentMoneyLinesController::insert");
$router->group("/spent-money-lines", function ($router) {
    $router->get("/{id:number}", "Accounting\SpentMoneyLines\SpentMoneyLinesController::get");
    $router->post("/{id:number}", "Accounting\SpentMoneyLines\SpentMoneyLinesController::update");
    $router->delete("/{id:number}", "Accounting\SpentMoneyLines\SpentMoneyLinesController::delete");
});

