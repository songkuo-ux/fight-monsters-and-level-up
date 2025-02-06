<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class testController extends Controller
{
    public function test($id = 1)
    {
        dd($id);
    }
}
