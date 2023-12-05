<?php

namespace App\Http\Controllers\BarAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderInvoiceController extends Controller
{
    //
    public function orderinvoice()
{
    return view('barAdmin.orderinvoice');
}
public function approved_orderinvoice()
{
    return view('barAdmin.approved-order-invoice');
}
public function cancel_orderinvoice()
{
    return view('barAdmin.cancel-order-invoice');
}
public function order_invoice_view()
{
    return view('barAdmin.order-invoice-view');
}
}
