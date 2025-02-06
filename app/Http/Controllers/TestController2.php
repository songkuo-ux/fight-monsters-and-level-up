<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController2 extends Controller
{
    public function  __invoke(Request $request){
        $this->middleware('csrf')->disable();
        echo $request->path();
//        echo $request->input('name');


}
}
