<?php

namespace App\Http\Controllers;
use App\Fasilitas;
use App\Layanan;
use App\Product;
use App\Order;
use App\Customer;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $fasilitas = Fasilitas::count();
        $layanan = Layanan::count();
        $product = Product::count();
        $order = Order::count();
        $cust = Customer::count();
        $ant= Order::where('status','Proses')->count();

        $chart_options = [
            'chart_title' => 'Order by days',
            'report_type' => 'group_by_date',
            'model' => 'App\Order',
            'group_by_field' => 'created_at',
            'group_by_period' => 'day',
            'chart_type' => 'bar',
        ];
    
        $chart1 = new LaravelChart($chart_options);

        return view('dashboard.index', compact('fasilitas','layanan','order','cust','product','ant','chart1'));
    }
}
