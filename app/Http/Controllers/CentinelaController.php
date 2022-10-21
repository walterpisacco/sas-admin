<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class CentinelaController extends Controller
{
    public function menu(){
        return view('centinela.menu');
    }

}
