<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index() {
        $clients = DB::table('clients')
        ->orderBy('id', 'desc')
        ->get();
        return view('admin.clients', [
            'clients' => $clients
        ]);
    }

    //EMAILS
    public function emails() {
        return view('admin.emails');
    }
}
