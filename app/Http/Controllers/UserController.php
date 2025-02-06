<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use JetBrains\PhpStorm\NoReturn;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $name = 're';
        echo $name;
        return $request->session()->token();
    }
}



