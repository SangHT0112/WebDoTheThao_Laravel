<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class QuickViewsController extends Controller
{
    public function QuickViews(Product $id)
    {
        $product = $id;

    }
}
