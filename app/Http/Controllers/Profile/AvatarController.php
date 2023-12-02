<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateAvatarRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class AvatarController extends Controller
{
    public function update(UpdateAvatarRequest $request){


        dd($request->all());

        return back()->with("message","Avata is added");
    }
}
