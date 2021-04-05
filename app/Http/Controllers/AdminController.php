<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Produto;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index()
    {
        $produtos = Produto::all();
        $categorias = Categoria::all();
        return view('index_admin',compact('produtos','categorias'));
    }
}
