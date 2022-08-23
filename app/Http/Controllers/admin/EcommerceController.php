<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Product;

class EcommerceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index() {
        //todos os produtos
        $products = Product::all();
        $totalProduct = count($products);

        //todos os clientes
        $clients = Client::all();
        $totalclient = count($clients);

        return view('admin.ecommerce', [
            'totalProduct' => $totalProduct,
            'totalclient' => $totalclient
        ]);
    }

    //Ver todas as vendas
    public function salesShow() {
        return view('admin.sales');
    }
}
