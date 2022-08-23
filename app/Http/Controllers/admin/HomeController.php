<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Client;
use App\Models\Product;
use App\Models\User;
use App\Models\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        //Views
        //ultimos 7 dias
        $dtHoje = date('Y-m-d H:i:s', strtotime('-7 days'));
        $view_7 = View::where('date_access', '>=', $dtHoje)->count();
        //ultimos 30 dias
        $dtHoje30 = date('Y-m-d H:i:s', strtotime('-30 days'));
        $view_30 = View::where('date_access', '>=', $dtHoje30)->count();
        //total de visitas
        $view_totals = View::all();
        $view_total = count($view_totals);

        //Vendas

        //Clientes
        //7 dias
        $dtHojeC7 = date('Y-m-d H:i:s', strtotime('-7 days'));
        $clients_7 = Client::where('date_cad', '>=', $dtHojeC7)->count();
        //30 dias
        $dtHojeC30 = date('Y-m-d H:i:s', strtotime('-30 days'));
        $clients_30 = Client::where('date_cad', '>=', $dtHojeC30)->count();

        //total
        $clientsList = Client::all();
        $clients = count($clientsList);

        //Admins
        $adminList = User::all();
        $admin = count($adminList);

        //Contagem dos online
        $groupOn = date('Y-m-d H:i:s', strtotime('-30 minutes'));
        $groupOnList = View::select('ip')
        ->where('date_access', '>=', $groupOn)
        ->groupBy('ip')
        ->get();
        $totalOn = count($groupOnList);

        //Onlines agora
        $now = date('Y-m-d H:i:s', strtotime('-30 minutes'));
        $nowTotals = View::select('ip', 'date_access', 'page')
        ->where('date_access', '>=', $now)
        ->orderBy('id', 'desc')
        ->get();

        return view('admin.home', [
            'view_7' => $view_7,
            'view_30' => $view_30,
            'view_total' => $view_total,
            'clients' => $clients,
            'clients_7' => $clients_7,
            'clients_30' => $clients_30,
            'admin' => $admin,
            'totalOn' => $totalOn,
            'nowTotals' => $nowTotals,
        ]);
    }
}
