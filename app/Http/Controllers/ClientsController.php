<?php

namespace App\Http\Controllers;

use Facade\FlareClient\View as FlareClientView;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ClientsController extends Controller
{
    public function index(){

    return view('clients.index');
    }
}
