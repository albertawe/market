<?php

namespace App\Http\Controllers;
use App\Product;
use App\Transaction;
use App\Pelanggan;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use Redirect;
use Validator;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
class TokoController extends Controller
{
    public function index() 
	{
	$product = Product::orderBy('id','desc')->paginate(4);
	return view('toko.productlist')->with('product', $product);
	}
	 
	public function showItem($id)
	{
	$product = Product::find($id);
	return view('toko.detail')->with('product', $product);
	} 
	
	 
	public function tambahItem($id) 
	{
	$product = Product::find($id);

		$id          = $product->id;
		$name        = $product->name;
		$qty         = 1;
		$price       = $product->price;

		$data = array('id'          => $id, 
					  'name'        => $name, 
					  'qty'         => $qty, 
					  'price'       => $price, 
					  'options'     => array('size' => 'large'));

		Cart::add($data);
		$cart_content = Cart::content(1);
		return view('toko.productcart')->with('cart_content', $cart_content);
	}
	
	public function hapusItem($id)
	{
	Cart::remove($id);
	$cart_content = Cart::content();

	if (Cart::count()== 0) {
	return Redirect::to('/')->with('message', 'Batal Transaksi');
	}
	else{
	return view('toko.productcart')->with('cart_content', $cart_content);
	}
	}
	
	public function checkout()
	{
		$formid       = str_random();
		$cart_content = Cart::content(1);

		foreach ($cart_content as $cart) {

			$transaction  = new Transaction();

			$product = Product::find($cart->id);

			$transaction->product_id  = $cart->id;
			$transaction->formid     = $formid;
			$transaction->tanggal     = date('Ymd');
			$transaction->qty         = $cart->qty;
			$transaction->total_price = $cart->price * $cart->qty;
			$transaction->status      = 'unpaid';
			$transaction->subtotal 	  = Cart::total();

			$transaction->save();

		}
		
		Cart::destroy();
		return view('toko.pelanggan')->with('formid', $formid);
	}
	
	public function savePelanggan(Request $request) 
	{
	 $this->validate($request, [
			'nama' => 'required',
            'telepon' => 'required',
            'alamat' => 'required',
			'propinsi' => 'required',
			'kodepos' => 'required',
    ]);
	
	$input = Input::all();
	Pelanggan::create( $input );
	$formid = Input::get('formid');
	$notrans = Transaction::where('formid', '=', $formid )->first();
	
	$transaction = Transaction::whereHas('product', function($q)
		{
		  $formid = Input::get('formid');
  		  $q->where('formid', '=', $formid);

		})->get();
	
	$pelanggan = Pelanggan::where('formid', '=', $formid)->first();
	
	return view('toko.invoice', compact('notrans', 'transaction', 'pelanggan'));

	}
}
