<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Setting;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Requests\InvoiceRequest;

class InvoiceController extends Controller
{

    public function index()
    {
        $data['title'] = "Invoice List";
        $data['allInvoice'] = Order::get();
        $data['dataCount'] = Order::count();
        return view('invoice.index')->with($data);
    }
    public function create()
    {
        $data['title'] = "New Invoice";
        return view('invoice.create')->with($data);
    }

    public function store(InvoiceRequest $request)
    {

        $arr = new Order();
        $arr->name = $request->name;
        $arr->address = $request->address;
        $arr->phone = $request->phone;
        $arr->invoice = $request->invoice;
        $arr->hst = $request->hst;
        $arr->date = $request->date;
        $arr->total = $request->total;
        $arr->tax = $request->tax;
        $arr->subtotal = $request->subtotal;
        $arr->total_qty = $request->total_qty;
        $arr->save();

        $order_id = $arr->id;
        $product = $request->product;
        $serial_no = $request->serial_no;
        $single_qty = $request->single_qty;
        $unit_price = $request->unit_price;
        $amount = $request->amount;
        for ($count = 0; $count < count($product); $count++) {
            $data = array(
                'product' => $product[$count],
                'serial_no' => $serial_no[$count],
                'single_qty' => $single_qty[$count],
                'unit_price' => $unit_price[$count],
                'amount' => $amount[$count],
                'order_id' => $order_id
            );
            $insert_data[] = $data;
        }
        $data = OrderDetail::insert($insert_data);
        if ($data) {
            Toastr::success('Save Successfully', 'Success');
        } else {
            Toastr::error('Some Error Occcurs', 'Danger');
        }
        return redirect()->back();
    }
    public function bulk_action(Request $request)
    {
        $type = $request->input("type");
        $id = $request->input("chk");

        if ($type == 0 && $id) {
            $data = Order::whereIn("id", $id)->delete();
            Toastr::success('Deleted Successfully', 'Success');
        } else {
            Toastr::error('Select Some Data First', 'Danger');
        }
        return redirect()->back();
    }
    public function view($id)
    {
        $data['title'] = "Invoice View";
        $data['allInvoice'] = Order::with('orderdetails')->find($id);
        $data['allSetting'] = Setting::first();
        return view('invoice.show')->with($data);
    }
}
