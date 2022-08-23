<?php

use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\EcommerceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\PerfilController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Site\ClientLojaController;
use App\Http\Controllers\Site\LoginLojaController;
use App\Http\Controllers\Site\ProductLojaController;
use App\Http\Controllers\Site\SiteController;

//Loja-Listagem do produtos
Route::prefix('/')->group(function() {
    //home
    Route::get('/', [ProductLojaController::class, 'index'])->name('loja.home');
    //Produto
    Route::get('/produto/{id}', [ProductLojaController::class, 'productShow'])->name('product.show');
    
    //Carrinho
    //Adicionar ao carrinho
    Route::get('/produto/{idproduto}/carrinho/adicionar', [ProductLojaController::class, 'adicionarCarrinho'])->name('adicionar_carrinho');
    //ver carrinho
    Route::get('/meucarrinho', [ProductLojaController::class, 'cartShow'])->name('loja.cart');
    //Excluir do carrinho
    Route::get('/{indice}/excluircarrinho', [ProductLojaController::class, 'excluirCarrinho'])->name('carrinho_excluir');

    //Login
    //view
    Route::get('/login', [LoginLojaController::class, 'login'])->name('loja.login');
    //recebe os dados
    Route::post('/login', [LoginLojaController::class, 'loginAction'])->name('loginLojaAction');
    //Logout da loja
    Route::get('/logout', [LoginLojaController::class, 'logout'])->name('loja.logout');

    //Cadastro
    //view
    Route::get('/cadastro', [LoginLojaController::class, 'create'])->name('loja.cadastro');
    //recebe os dados
    Route::post('/cadastro', [LoginLojaController::class, 'createAction'])->name('createAction');
});

//Painel
Route::prefix('/admin')->group(function(){
    //LOGIN
    //tela de login
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    //receber os dados de login
    Route::post('/login', [LoginController::class, 'loginAction'])->name('loginAction');
    //logout
    Route::get('/logout', [LoginController::class, 'logout'])->name('admin.logout');
    

    //CADASTRO
    Route::get('/cadastro', [LoginController::class, 'register'])->name('register');
    //recebe os dados de cadastro
    Route::post('/cadastro', [LoginController::class,'registerAction'])->name('registerAction');

    //HOME
    Route::get('/', [HomeController::class, 'index'])->name('admin.home');

    //ECOMMERCE-VENDAS
    Route::get('/ecommerce', [EcommerceController::class, 'index'])->name('admin.vendas');
    //VENDAS
    //todas
    Route::get('/vendas', [EcommerceController::class, 'salesShow'])->name('admin.sales');


    //CLIENTES
    Route::get('/clientes', [ClientController::class, 'index'])->name('admin.clients');

    //EMAILS
    Route::get('/emails', [ClientController::class, 'emails'])->name('admin.emails');

    //PRODUTOS
    Route::get('/produtos', [ProductController::class, 'index'])->name('admin.products');
    //adicionar produto
    Route::get('/produto/adicionar', [ProductController::class, 'insert'])->name('product.add');
    //receber os dados de adicionar produto
    Route::post('/produto/adicionar', [ProductController::class, 'insertAction'])->name('product.addAction');
    //deleta o produto-junto com a imagem
    Route::get('/produto/delete/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
    //estatísticas do produto
    Route::get('/produto/estatistica/{id}', [ProductController::class, 'showStatistics'])->name('product.statistic');

    //USÚARIOS
    //listagem
    Route::get('/usuarios', [UserController::class, 'index'])->name('admin.users');
    //adicionar usuario
    Route::get('/usuarios/adicionar', [UserController::class, 'create'])->name('users.add');
    //recebe os dados para adiçaõ de usuario
    Route::post('/usuarios/adicionar', [UserController::class, 'createAction'])->name('users.addAction');
    //editar usuário
    Route::get('/usuarios/editar/{id}', [UserController::class, 'edit'])->name('users.edit');
    //recebe os dados da edição
    Route::put('/usuarios/editar/{id}', [UserController::class, 'editAction'])->name('user.editAction');

    //PERFIL
    Route::get('/perfil', [PerfilController::class, 'index'])->name('admin.perfil');
    //receber os dados
    Route::put('/perfil', [PerfilController::class, 'perfilAction'])->name('perfilAction');
});

