<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // index
    public function index(Request $request) {
        dd($request->all());
    }
}
