@extends('layouts.app')
@section('content')
    <!-- Page header start -->
    <div class="page-header">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('invoice.index') }}">Invoice List</a></li>
        </ol>
    </div>
    <!-- Page header end -->
    @include('invoice.css-script')
    <!-- Main container start -->
    <div class="main-container">
        <!-- Row start -->
        <div class="row gutters">
            @include('extra.message')
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="invoice-container">
                            <div class="invoice-header">
                                <form method="post" id="dynamic_form" action="{{ route('invoice.store') }}">
                                    @csrf
                                    <!-- Row end -->
                                    <div class="form-group">
                                        <!-- Row start -->
                                        <div class="row gutters">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 invoice-1">
                                                <h4 class="text-center invoice-2">New Invoice</h4>
                                            </div>
                                            <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                                                <div class="invoice-details">
                                                    <address>
                                                        <div class="row">
                                                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 p-1">
                                                                <b>Company / Name of Customer:</b>
                                                            </div>
                                                            <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12 p-1">
                                                                <input type="text" name="name" value=""
                                                                    placeholder="Enter Company / Name of Customer"
                                                                    style="width:100%;" />
                                                            </div>
                                                            <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-12">
                                                                <div class="row">
                                                                    <div
                                                                        class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 p-1">
                                                                        <b>Address:</b>
                                                                    </div>
                                                                    <div
                                                                        class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12 p-1">
                                                                        <input type="text" name="address" value=""
                                                                            placeholder="Enter Address"
                                                                            style="width:100%;" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12">
                                                                <div class="row">
                                                                    <div
                                                                        class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 p-1">
                                                                        <b>Phone:</b>
                                                                    </div>
                                                                    <div
                                                                        class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12 p-1">
                                                                        <input type="text" name="phone"
                                                                            placeholder="Enter Phone Number"
                                                                            style="width:100%;" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </address>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                                                <div class="invoice-details">
                                                    <div class="invoice-num text-left">
                                                        <div class="row">
                                                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 p-1">
                                                                <b>Invoice</b>
                                                            </div>
                                                            <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12 p-1">
                                                                <input type="text" readonly name="invoice" value="{{isset($lastInvoice->id)?$lastInvoice->id:1 + 1}}"
                                                                    placeholder="Invoice Number" style="width:100%;" />
                                                            </div>
                                                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 p-1">
                                                                <b>Date</b>
                                                            </div>
                                                            <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12 p-1">
                                                                <input type="date" name="date" value="{{date('Y-m-d')}}"
                                                                    style="width:100%;" />
                                                            </div>
                                                        </div>
                                                        <input type="hidden" name="total_qty" class="total_qty"
                                                            value="0" />
                                                        <input type="hidden" name="total" class="total_amt"
                                                            value="0" />
                                                        <input type="hidden" name="tax" class="total_tax"
                                                            value="0" />
                                                        <input type="hidden" name="subtotal" class="total_sub"
                                                            value="0" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- </form> -->
                                        <!-- Row end -->
                                    </div>
                                    <div class="invoice-body">
                                        <!-- Row start -->
                                        <div class="row gutters">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="table-responsive">
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
                                                    </style>
                                                    <div class="table-responsive">
                                                        <span id="result"></span>
                                                        <table class="table table-bordered table-striped" id="user_table">
                                                            <thead>
                                                                <tr>
                                                                    <th style="width:15%;">Items / Serial No.</th>
                                                                    <th style="width:50%;">Description / Specification</th>
                                                                    <th style="width:10%;">Qty</th>
                                                                    <th style="width:10%;">Unit Price</th>
                                                                    <th style="width:15%;">Amount</th>
                                                                    <th class="">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            </tbody>
                                                            <tfoot>
                                                                <tr>
                                                                    <th colspan="2"></th>
                                                                    <th><span id="total_qty">0</span> Items</th>
                                                                    <th>Total</th>
                                                                    <th colspan="2"><span id="total_amt">0</span></th>
                                                                </tr>
                                                                <tr>
                                                                    <th colspan="6"><input type="submit"
                                                                            name="save" id="save"
                                                                            class="btn btn-success btn-md btn-block col-4"
                                                                            value="Save Invoice" /></th>
                                                                </tr>
                                                            </tfoot>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Row end -->
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Row end -->
        </div>
    @endsection
