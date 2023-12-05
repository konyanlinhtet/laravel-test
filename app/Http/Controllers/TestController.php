<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\App;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function __construct()
    {
        $this->middleware('cheese');

    }
    //view test page
    public function test() {
        // $value = config('app.timezone', 'Asia/Seoul');
        // dd($value);
        // return view('test');
        // dd("test");
        return to_route("admin.users");
    }
    public function middlewareTest() {
        return "Hello";
    }
}
