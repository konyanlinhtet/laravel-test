<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\App;

use Illuminate\Http\Request;

class TestController extends Controller
{
    //view test page
    public function test() {
        // $value = config('app.timezone', 'Asia/Seoul');
        // dd($value);
        // return view('test');
        // dd("test");
        return to_route("admin.users");
    }
}
