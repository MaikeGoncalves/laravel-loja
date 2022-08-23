<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Product_view;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request) {
        //filtro de busca
        $products = Product::query();

        $products->when($request->search, function($query, $vl) {
            $query->where('name', 'like', '%' . $vl . '%');
        });
        $products = $products->orderBy('id', 'desc')->get();

        return view('admin.products', [
            'products' => $products
        ]);
    }

    //estatisticas do produto
    public function showStatistics($id) {
        $produtStatistic = Product::find($id);

        if($produtStatistic) {
            $productViews = Product_view::select('date_access')
            ->where('id_product', $produtStatistic->id)
            ->get();
            $productViewTotal = count($productViews);

            return view('admin.statistics', [
                'produtStatistic' => $produtStatistic,
                'productViewTotal' => $productViewTotal
            ]);
        }

    }

    public function insert() {
        //lembra de na criação colocar o slug
        return view('admin.addproduct');
    }

    //action add porduto
    public function insertAction(Request $request) {
        $data = $request->only([
            'name',
            'price',
            'stock',
            'min_stock',
            'description',
            'cover'
        ]);

        $request->validate([
            'name' => 'required|string|max:50',
            'price' => 'required|string',
            'stock' => 'required|string',
            'min_stock' =>'required|string',
            'description' => 'required|string',
            'cover' => 'image|mimes:jpg,png,jpeg'
        ]);

        //validação a parte da imagem
        if(!empty($data['cover'])) {
            
            $cover = $request->file('cover');

            $dest = public_path('/media/products');
            $coverName = md5(time().rand(0,9999)).'.jpg';

            $img = Image::make($cover->getRealPath());
            $img->fit(640, 480)->save($dest.'/'.$coverName);
        }

        $products = new Product();
        $products->name = $data['name'];
        $products->price = $data['price'];
        $products->stock = $data['stock'];
        $products->min_stock = $data['min_stock'];
        $products->description = $data['description'];
        $products->cover = $coverName;
        $products->save();

        return redirect()->route('admin.products')
        ->with('message', 'Novo produto adicionado com sucesso!');
    }

    //Deletar produto
    public function destroy($id) {
        $product = Product::find($id);

        if($product) {
            //primeiro verifica e exclui a imagem
            if(!empty($product['cover'])) {
                File::delete(public_path('/media/products/'.$product['cover']));
            }
            //deleta o produto
            $product->delete();
            
            return redirect()->route('admin.products')
            ->with('deletsuccess', 'Produto excluído com sucesso!');
        }

        return redirect()->route('admin.products');

    }
}
