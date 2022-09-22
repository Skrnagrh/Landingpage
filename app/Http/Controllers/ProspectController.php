<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prospect;
use App\Models\Startup;

class ProspectController extends Controller
{
    public function show(Prospect $prospect)
    {
    return view('detail_prospect', [
        'title' => 'Job Prospect',
        "active" => 'home', 
        "prospect" => $prospect,
    ]);
    }
}
