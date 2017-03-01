<?php

namespace App\Http\Controllers;
use App\Product;
use App\Transaction;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Input;
use Redirect;
use Validator;
use Illuminate\Http\Request;

class AdminLaporanController extends Controller
{
    public function index() {
	return view('toko.admin.laporan');
	}
	
	public function getPeriode(Request $request) {
	$this->validate($request, [
			'awal' => 'required',
            'akhir' => 'required',

    ]);
	
	$from = date('Y-m-d', strtotime(Input::get('awal')));
  	$to = date('Y-m-d', strtotime(Input::get('akhir')));
	
		$transaction = Transaction::whereHas('product', function($q)
		{
		$from = date('Y-m-d', strtotime(Input::get('awal')));
  		$to = date('Y-m-d', strtotime(Input::get('akhir')));
	  
  		  $q->whereBetween('tanggal', array($from,$to));

		})->get();
	
	return view('toko.admin.periode', compact('transaction', 'from', 'to'));
	}
}
