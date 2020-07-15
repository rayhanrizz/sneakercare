<?php

namespace App\Http\Controllers;
use App\Fasilitas;
use App\Layanan;
use App\Product;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $data = Fasilitas::all();
        $lyn = Layanan::all();	
        $prd = Product::all();
        return view('index', compact('data','lyn','prd'));
    }
}
