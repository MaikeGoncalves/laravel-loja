<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Product_view;
use DateTime;
use App\Models\View;
use Illuminate\Support\Facades\DB;

class ProductLojaController extends Controller
{
    public function index(Request $request) {
        //Filtro de busca profissional
        $products = Product::query();

        $products->when($request->search, function($query, $vl) {
            $query->where('name', 'like', '%' . $vl . '%');
        });

        $products = $products->orderBy('id', 'desc')->get();

        //Registrando visualização geral
        $now = new DateTime();
        $ip = $_SERVER['REMOTE_ADDR'];
        View::insert([
            'date_access' => $now,
            'ip' => $ip
        ]);

        return view('site.home', [
            'products' => $products
        ]);
    }

    public function productShow($id, Request $request) {
        $product = Product::find($id);

        if($product) {
            //adiciona uma visualização a esse produto
            $now = new DateTime();

            $viewP = new Product_view;
            $viewP->id_product = $product->id;
            $viewP->date_access = $now;
            $viewP->save();

            return view('site.product', [
                'product' => $product
            ]);
        }

        return redirect()->route('loja.home');
    }

    //adicionar no carrinho
    public function adicionarCarrinho($idProduto = 0, Request $request) {
        //Buscar o produto pelo ID
        $product = Product::find($idProduto);

        if($product) {
            //Se encontrar um produto

            //Buscar da sessão o carrinho atual
            $carrinho = session('cart', []);
            //adicionando no array carrinho o produto que o cara clicou
            array_push($carrinho, $product);
            //atualizamos a sessão com o produto que adicionou
            session([ 'cart' => $carrinho ]);
        }

        return redirect()->route('loja.cart');
    }
    //ver carrinho
    public function cartShow(Request $request) {
        //buscando as coisas na sessão
        $carrinho = session('cart', []);
        $data = [ 'cart' => $carrinho ];

        return view('site.cart', $data);
    }
    //excluir carrinho
    public function excluirCarrinho($indice, Request $request) {
        //buscar a sessão do carrinho
        $carrinho = session('cart', []);

        if(isset($carrinho[$indice])) {
            unset($carrinho[$indice]);
        }
        session(["cart" => $carrinho]);

        return redirect()->route('loja.cart');
    }
}
