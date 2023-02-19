<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;

class RouteController extends Controller
{
    public function dashboard()
    {
        return view('dashboard.index');
    }

    public function slider()
    {
        $sliders = Slider::active()->orderBy('order', 'asc')->get();
        
        return view('sliders.index', compact('sliders'));
    }
}
