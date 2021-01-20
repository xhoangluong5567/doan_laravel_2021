<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\BillRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Bill;
Use App\Customer;
use App\Http\Controllers\CartController;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\BillDetail;
class AdminBillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['title'] = 'Quản lý hóa đơn';
        $customers = DB::table('customers')
                    ->orderBy('id', 'desc')
                    ->get();
        $this->data['customers'] = $customers;
        return view('layouts.backend.bill.index', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $customerInfo = DB::table('customers')
                        ->join('bills', 'customers.id', '=', 'bills.customer_id')
                        ->select('customers.*', 'bills.id as bill_id', 'bills.total as bill_total', 'bills.note as bill_note',)
                        ->where('customers.id', '=', $id)
                        ->first();

        $billInfo = DB::table('bills')
                    ->join('bill_details', 'bills.id', '=', 'bill_details.bill_id')
                    ->leftjoin('products', 'bill_details.product_id', '=', 'products.id')
                    ->where('bills.customer_id', '=', $id)
                    ->select('bills.*', 'bill_details.*', 'products.name as product_name')
                    ->get();
                    
        $this->data['customers'] = $customerInfo;
        $this->data['bill'] = $billInfo;

        return view('layouts.backend.bill.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $bill = Bill::find($id);
        $bill->status = $request->input('status');
        $bill->save();
        Session::flash('message', "Cập nhật thành công");

        return Redirect::to('admin/bill');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bill = Bill::find($id);
        $bill->delete();
        Session::flash('message', "Successfully deleted");

        return Redirect::to('layouts/backend/bill');
    }
}








