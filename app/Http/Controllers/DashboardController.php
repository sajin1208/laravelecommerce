<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class DashboardController
{
      public function homeshow(){

        $products=Product::all();
        return view('dashboard',compact('products'));

    }
}
