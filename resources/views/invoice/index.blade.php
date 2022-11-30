@extends('layouts.app')
@section('content')
    <!-- Page header start -->
    <div class="page-header">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('invoice.index') }}">Invoice</a></li>
        </ol>
    </div>
    <!-- Main container start -->
    <div class="main-container">
        <!-- Row start -->
        <div class="row gutters">
            @include('extra.message')
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="table-container">
                    <div class="t-header">Invoice List</div>
                    <div class="table-responsive">
                        @if ($dataCount > 0)
                            <form style="overflow: hidden;" action="{{ route('invoice.bulk_action') }}" method="post">
                                @csrf
                                <div class="dropdown show">
                                    <button class="btn btn-danger btn-sm dropdown-toggle" type="button" width="20px"
                                        role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        Bulk Action
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <button type="button" class="dropdown-item" data-toggle="modal"
                                            onclick="modalBulk(0)" data-target=".bd-example-modal-sm-action"
                                            href="#">Pernament Delete</button>
                                    </div>
                                </div>
                                <table id="highlightRowColumn" class="table custom-table">
                                    <thead>
                                        <tr>
                                            <th data-orderable="false" width="10px"><input type="checkbox"
                                                    id="chkSelectAll" />SL:</th>
                                            <th>Invoice</th>
                                            <th>Date</th>
                                            <th>Company Name</th>
                                            <th>Phone</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($allInvoice as $key => $value)
                                            <tr>
                                                <td><input type="checkbox" name="chk[]" class="chkDel"
                                                        value="{{ $value->id }}" />{{ $loop->iteration }}</td>
                                                <td>{{ $value->invoice }}</td>
                                                <td>{{ $value->date }}</td>
                                                <td>{{ $value->name }}</td>
                                                <td>{{ $value->phone }}</td>
                                                <td>
                                                    <a href="{{ route('invoice.view', $value->id) }}"><span
                                                            class="btn btn-success btn-md" title="View Row"><i
                                                                class="icon-zoom_out_map"></i></span></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @include('extra.bulk-action')
                            </form>
                        @else
                            <p class="text-center">Data is empty</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
