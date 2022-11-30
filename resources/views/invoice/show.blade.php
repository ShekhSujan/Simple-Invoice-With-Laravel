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
            border-top: 1px solid #d3d9e0;
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
            border: 1px solid #999;
            width: 100%;
        }

        table td,
        table th {
            border: 1px solid #ccc;
        }

        table input {
            max-width: 100%;
            border: 1px solid #ccc;
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
            /*size: portrait;*/
            /*margin: 0px;*/


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
                border: 1;
            }

            .custom-table {
                border: 1;
            }

            .custom-table>tbody td {
                border: 1;
            }

            div.divHeader {
                position: fixed;
                top: 1;
            }

            div.divFooter {
                position: fixed;
                bottom: 0;
            }

            #printableArea,
            #printableArea * {
                visibility: visible;
            }

            #printableArea {
                position: absolute;
                top: 0;
                margin-left: -55px;
                margin-right: 0px;
                margin-top: 30px;
                margin-bottom: 30px;
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
    <!-- Main container start -->
    <div class="main-container">
        <!-- Row start -->
        <div class="row gutters">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body p-0" id="printableArea">
                        <div class="invoice-container">
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
                                <!-- Row end -->
                                <!-- Row start -->
                                <div class="row gutters logo-title">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 pl-1">
                                        <a href="#">
                                            <img src="{{ asset("assets/images/logo/{$allSetting->id}-logo.{$allSetting->logo}") }}"
                                                width="100%" />
                                        </a>
                                    </div>
                                </div>
                                <!-- Row end -->
                                <!-- Row start -->
                                <div class="row gutters">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 invoice-1">
                                        <h4 class="text-center invoice-2">Invoice</h4>
                                    </div>
                                    <div class="col-xl-9 col-lg-9 col-xl-9 col-xl-9 col-9">
                                        <div class="invoice-details inv-margin-left">
                                            <address>
                                                <div class="row">
                                                    <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-5">
                                                        <b class="cl">Company / Name of Customer:</b>
                                                    </div>
                                                    <div class="col-xl-7 col-lg-7 col-md-7 col-sm-7 col-7">
                                                        <u class="doted_underline">{{ $allInvoice->name }}</u>
                                                    </div>
                                                    <div class="col-xl-7 col-lg-7 col-md-7 col-sm-7 col-7">
                                                        <div class="row">
                                                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 ">
                                                                <b class="cl">Address:</b>
                                                            </div>
                                                            <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 col-9 ">
                                                                {{ $allInvoice->address }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-5">
                                                        <div class="row">
                                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 ">
                                                                <b class="cl">Phone:</b>
                                                            </div>
                                                            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8 ">
                                                                {{ $allInvoice->phone }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </address>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">
                                        <div class="invoice-details inv-margin-right">
                                            <div class="invoice-num text-left">
                                                <div class="row">
                                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 pr-0">
                                                        <b class="">Invoice</b>
                                                    </div>
                                                    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8">
                                                        {{ $allInvoice->invoice }}
                                                    </div>
                                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
                                                        <b>Date</b>
                                                    </div>
                                                    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8">
                                                        {{ $allInvoice->date }}
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
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="table-responsive">
                                            <table class="table custom-table">
                                                <thead>
                                                    <tr>
                                                        <th>SL</th>
                                                        <th style="width:15%;">Items / Serial No.</th>
                                                        <th style="width:50%;">Description / Specification</th>
                                                        <th style="width:10%;">Qty</th>
                                                        <th style="width:10%;">Unit Price</th>
                                                        <th style="width:15%;">Amount</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="myTable">
                                                    @foreach ($allInvoice->orderdetails as $key => $value)
                                                        <tr>
                                                            <td>{{ $key + 1 }}.</td>
                                                            <td>{{ $value->serial_no }}</td>
                                                            <td>{{ $value->product }}</td>
                                                            <td>{{ $value->single_qty }}</td>
                                                            <td>{{ $value->unit_price }} </td>
                                                            <td>{{ $value->amount }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <td colspan="3"></td>
                                                        <td><span id="total_qty">{{ $allInvoice->total_qty }}</span> Items
                                                        </td>
                                                        <td>Total</td>
                                                        <td><span id="total_amt">{{ $allInvoice->total }}</span> $</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="4"></td>
                                                        <td>Tax 13%</td>
                                                        <td><span id="total_tax">{{ $allInvoice->tax }}</span> $</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="4"></td>
                                                        <td>Subtotal</td>
                                                        <td><span id="total_sub">{{ $allInvoice->subtotal }}</span> $
                                                        </td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                            <p class="invoice-terms"><b></b>
                                                <span class="hst">HST#
                                                    {{ $allInvoice->hst }}
                                                </span>
                                            </p>
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
