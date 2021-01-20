<?php

namespace App\Http\Controllers;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Bill;
use App\Customer;
use App\BillDetail;
use Illuminate\Support\Collection;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Session;


class CartController extends Controller
{
    public function getAddCart($id){
        $product_by = DB::table('products')->where('id',$id)->first();
        Cart::add(array('id'=>$id,'name'=>$product_by->name,'qty'=>1,'price'=>$product_by->price,'options'=>['images'=>$product_by->images]));
        return redirect('cart/show');

    }

    public function getShowCart(){
        $data['total'] = Cart::total();
        $data['items'] = Cart::content();
        
        return view('layouts.frontend.cart', $data);

    }
    public function getDeleteCart($id){
        if($id=='all'){
            Cart::destroy();

        }else{
            Cart::remove($id);

        }
        return back();

    }
    public function getUpdateCart(Request $request){
        Cart::update($request->rowId,$request->qty);

    }
    public function postComplete(Request $request){
        $data['info'] = $request->all();
        $email = $request->email;
        $data['total'] = Cart::total();
        $data['cart'] = Cart::content();
        Mail::send('layouts.frontend.email', $data, function ($message) use ($email) {
            $message->from('xxhoangluong@gmail.com', 'Hoàng Lương');
            $message->to($email, $email);
            $message->cc('xhoangluong@gmail.com', 'Hoàng Lương');
            $message->subject('Xác nhận mua hàng');


        });
        return redirect('complete');
    }

    
    //
    public function getComplete(){
        return view('layouts.frontend.complete');
    }
    public function postCheckOut(Request $req){


        $cart = Cart::content();
        $customers = new Customer;

        $customers->email = $req->email;
        $customers->name = $req->name;
        $customers->phone = $req->phone;
        $customers->add = $req->add;
        $customers->note = $req->note;
        $customers->save();

        $bill = new Bill;
        $bill->customer_id = $customers->id;
        $bill->date_order = date ('Y-m-d H:i:s');
        $bill->total= Cart::total();
        $bill->note = $req->note;
        $bill->save();

        // foreach ($cart->items as $key=> $value) {
        // foreach ($cart->$pr as $item =>$value) {
            if (count($cart)>0){
                foreach ($cart as $key => $item) {
        $bill_details = new BillDetail;
        $bill_details->bill_id = $bill->id;
        $bill_details->product_id = $item->id;
        $bill_details->quantity = $item->qty;
        $bill_details->price = $item->price;
        $bill_details->save();
        // dd($bill_details);

        // Session::forget('cart');
                }
                Cart::destroy();
                return redirect('complete');

            }

        
        // $bill_details->quantity = $quantity->quantity;
        // $bill_details->save();
        // dd($cart);
        // }
        



    }
    
    public function store(Request $request)
    {
        $this->validate($request,
        [
                'qty' => 'required|min:1|max:255',
            ],
    
            [
                'required' => ':attribute Không được để trống',
                'min' => ':attribute Không được nhỏ hơn :min',
                'max' => ':attribute Không được lớn hơn :max',
                'integer' => ':attribute Chỉ được nhập số',
            ],
    
            [
                'qty' => 'Số Lượng',
            ]
    
        );
    
    }
    
}

