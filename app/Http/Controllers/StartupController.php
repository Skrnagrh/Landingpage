<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Startup;

class StartupController extends Controller
{
    public function detail(Startup $startup)
    {
    return view('detail_startup', [
        "title" => "Startup",
        "active" => 'startup', 
        "startup" => $startup
    ]);
    }
}
