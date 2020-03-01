<?php

namespace App\Http\Controllers\Dashboard;


use App\Models\Category;
use App\Models\Client;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
// use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index()
    {
        // $categories_count = Category::count();
        // $products_count = Product::count();
        // $clients_count = Client::count();
        // $users_count = User::whereRoleIs('admin')->count();
        // $sales_data = Order::selectRaw('year(created_at) year, monthname(created_at) month, SUM(price) sum' )
        //               ->groupBY('year' , 'month')
        //               ->orderByRaw('min(created_at) desc')
        //               ->get();



        return view('dashboard.welcome');

    }//end of index

}//end of controller

