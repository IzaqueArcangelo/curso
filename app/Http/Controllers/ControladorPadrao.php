<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControladorPadrao extends Controller
{
    public function inicio(){
        return view('index');
    }
}
