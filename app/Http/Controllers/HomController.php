<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomController extends Controller
{
    public function index()
    {
        return view ('Components.layout');
    }
}
