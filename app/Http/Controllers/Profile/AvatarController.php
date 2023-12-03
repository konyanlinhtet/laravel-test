<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateAvatarRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
class AvatarController extends Controller
{
    public function update(UpdateAvatarRequest $request){

        //adding image
        $path = Storage::disk('public')->put('avatars', $request->file('avatar'));
        if($oldPath = auth()->user()->avatar){
            Storage::disk('public')->delete($oldPath);
        }
       auth()->user()->update(['avatar'=>  $path]);

        return back()->with("message","Avata is added");
    }
}
