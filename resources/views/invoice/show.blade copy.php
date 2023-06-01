@extends('layouts.app')
@section('content')
<!-- Page header start -->
<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('invoice.index') }}">Invoice</a></li>
    </ol>
</div>
<!-- Page header end -->
<style>
    .invoice-container .invoice-header .invoice-logo img {
        max-width: 150px;
    }

    .title-noborupa {
        color: #074694;
    }

    .logo-title {
        background-color: #b9e2c2;
        padding: 10px 0px 30px 0px;
    }

    .invoice-1 {
        padding-top: 8px;
        text-align: center;
    }

    .invoice-2 {
        font-weight: 700;
        border: 2px solid;
        display: inline-block;
        padding: 1px 20px 1px 20px;

    }

    .invoice-terms {
        font-size: 12px;
    }

    .hst {
        font-size: 16px;
        font-weight: 700;
        float: right;
    }

    .invoice-footer-link {
        font-weight: 600;
    }

    .invoice-footer {
        background-color: #b9e2c2;
        padding: 10px 15px 10px 15px;
    }

    .table td {
        border-top: 1px solid #000000;
        vertical-align: middle;
        padding: .65rem .65rem;
    }
</style>
<style media="screen">
    * {
        font-family: 'Segoe UI';
    }

    th {
        text-align: left;
        font-weight: 600;
    }

    table {
        border-collapse: collapse;
        border: 1px solid #000000;
        width: 100%;
    }

    table td,
    table th {
        border: 1px solid #000000;
    }

    table input {
        max-width: 100%;
        border: 1px solid #000000;
    }

    table td:first-child input {
        width: 100%;
    }

    table td:nth-child(1) input {
        width: 100%;
    }

    table td:nth-child(2) input {
        width: 100%;
    }

    table td:nth-child(3) input {
        width: 100%;
    }

    table td:nth-child(4) input {
        width: 100%;
    }

    table td:nth-child(5) input {
        width: 100%;
    }

    .inv-margin {
        margin: 0px 25px 0px 25px;
    }

    .inv-margin-right {
        margin-right: 25px !important;
    }

    .inv-margin-left {
        margin-left: 25px !important;
    }
</style>
<style>
    @page {
        size: A4 portrait;
        /* size: portrait;
                                    margin: 0px; */


    }

    @media screen {
        div.divFooter {
            display: none;
        }

        div.divHeader {
            display: none;
        }
    }

    @media print {
        body * {
            visibility: hidden;
        }

        .custom-table>tbody td {
            border: 1px solid #000000;
        }

        .custom-table {
            border: 1px solid #000000;
        }

        .custom-table>tbody td {
            border: 1px solid #000000;
        }

        #printableArea,
        #printableArea * {
            visibility: visible;
        }

        #printableArea {
            position: absolute;
            left: 0;
            top: 0;
            padding: 0 12px 0px 0px;
        }

        .invoice-container {
            padding: 3rem 0rem 0rem 3rem;
            margin: 3rem 0rem 0rem 3rem;

        }

        #hide-button {
            display: none;
        }
    }
</style>
<script>
    $(document).ready(function() {
        $("#print").click(function() {
            //alert("ok");
            $("#pin-sidebar").click();
            // $("#hide-button").hide();
            window.print();
            $("#pin-sidebar").click();;

        });
    });
</script>
<style>
    .clr {
        color: #000000 !important;
    }

    .invoice-container {
        padding: 3rem 1rem 0rem 3rem;
        margin: 3rem;
    }

    .invoice-container .invoice-details {
        border: 1px solid #000000 !important;
    }
</style>
<!-- Main container start -->
<div class="main-container">
    <!-- Row start -->
    <div class="row gutters">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-body p-0 pad-pic" id="printableArea">
                    <div class="invoice-container pad">
                        <div class="invoice-header">
                            <!-- Row start -->
                            <div class="row gutters" id="hide-button">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <div class="custom-actions-btns mb-5">
                                        <button id="print" class="btn btn-dark">
                                            <i class="icon-printer"></i> Print
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 invoice-1">
                                    <h4 class="text-center invoice-2">Invoice</h4>
                                </div>
                                <div class="col-xl-9 col-lg-9 col-xl-9 col-xl-9 col-9">
                                    <div class="invoice-details inv-margin-left">
                                        <address>
                                            <div class="row">
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <p class="clr text-left">
                                                        <span class=" font-weight-bold pr-1">Company / Customer: </span>
                                                        <span class="doted_underline">{{ $allInvoice->name }}</span>
                                                    </p>
                                                </div>
                                                <div class="col-xl-7 col-lg-7 col-md-7 col-sm-7 col-7">
                                                    <p class="clr text-left">
                                                        <span class=" font-weight-bold pr-1">Address: </span>
                                                        <span class="doted_underline"> {{ $allInvoice->address }}</span>
                                                    </p>
                                                </div>
                                                <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-5">
                                                    <p class="clr text-left">
                                                        <span class=" font-weight-bold pr-1">Phone: </span>
                                                        <span class="doted_underline"> {{ $allInvoice->phone }}</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </address>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">
                                    <div class="invoice-details inv-margin-right">
                                        <div class="invoice-num text-left">
                                            <div class="row">

                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pr-0">
                                                    <p class="cl text-left">
                                                        <span class=" font-weight-bold pr-1">Invoice: </span>
                                                        <span class="doted_underline"> {{ $allInvoice->invoice }}</span>
                                                    </p>
                                                </div>
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pr-0">
                                                    <p class="cl text-left">
                                                        <span class=" font-weight-bold pr-1">Date: </span>
                                                        <span class="doted_underline"> {{ $allInvoice->date }}</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Row end -->
                        </div>
                        <div class="invoice-body inv-margin">
                            <!-- Row start -->
                            <div class="row gutters">
                                <div class="col-lg-12 col-md-12 col-sm-12 pb-5 mb-5">
                                    <div class="table-responsive">
                                        <table class="table custom-table">
                                            <thead>
                                                <tr>
                                                    <th>SL</th>
                                                    <th style="width:65%;">Description / Specification</th>
                                                    <th style="width:10%;">Qty</th>
                                                    <th style="width:10%;">Price</th>
                                                    <th style="width:15%;">Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody id="myTable">
                                                @foreach ($allInvoice->orderdetails as $key => $value)
                                                <tr>
                                                    <td class="clr">{{ $key + 1 }}.</td>
                                                    <td class="clr">{{ $value->product }}</td>
                                                    <td class="clr">{{ $value->single_qty }}</td>
                                                    <td class="clr">{{ $value->unit_price }} </td>
                                                    <td class="clr">{{ $value->amount }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="3"></td>
                                                    <td class="clr">Qty</td>
                                                    <td class="clr"><span id="total_qty">{{ $allInvoice->total_qty }}</span></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3"></td>
                                                    <td class="clr">SubTotal</td>
                                                    <td class="clr"><span id="total_amt">{{ $allInvoice->total }}</span>
                                                    </td>
                                                </tr>

                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pt-3">
                                    <h5>Prepared By: ................................</h5>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pt-3">
                                    <h5>Customer’s Signature: ..................................</h5>
                                </div>
                            </div>
                            <!-- Row end -->
                        </div>
                        <div class="invoice-footer">
                            <div class="row gutters text-left">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pt-3">
                                    <h5>{{ $allSetting->address }}</h5>
                                    <a href="#" class="invoice-footer-link h6">{{ $allSetting->email }}</a>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pt-3">
                                    <h5>{{ $allSetting->phone }}</h5>
                                    <a href="#" class="invoice-footer-link h6"> {{ $allSetting->website }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Row end -->
</div>
@endsection
