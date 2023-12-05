<?php

use App\Models\User;
use GuzzleHttp\Psr7\Uri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use Symfony\Component\Routing\Route;
use OpenAI\Laravel\Facades\OpenAI;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProvisionServer;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Profile\AvatarController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
    // $user = User::all();
    // $user->update([
    //     'name' => 'Thet'
    // ]);
    // User::create([
    //     'name'=> 'Admin5',
    //     'email'=> 'admin5@gmail.com',
    //     'password'=> 'password',
    // ]);
    // $user = User::find(9);
    // dd($user->name);
})->name("welcome");

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/avatar', [AvatarController::class, 'update'])->name('profile.avatar.update');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/test', [TestController::class, 'test'])->name('test');

require __DIR__.'/auth.php';

// Route::get('/openai', function () {


// $result = OpenAI::chat()->create([
//     'model' => 'gpt-3.5-turbo',
//     'messages' => [
//             ['role' => 'user', 'content' => 'Hello!'],
//         ],
//     ]);

//     echo $result->choices[0]->message->content;
// });

// Route::redirect('/here', '/there');
// Route::redirect('/here', '/there', 301);
// Route::permanentRedirect('/here', '/there');


// Route::get('/test1/{id}', function (string $id) {
//     return 'User '.$id;
// });

// Route::get('/test1/{id?}', function (Request $request, ?string $id = "59") {
//     return 'test1 '.$id;
// });

// Route::get('/test1/{name?}', function (?string $name ="Hello") {
//     return $name;
// })->where('name', '[A-Za-z]+');

// public function boot(): void
// {
//     Route::pattern('id', '[0-9]+');
// };
// Route::get('/test1/{id}', function (string $id) {
//     return $id;
// });

// Route::get('/search/{search}', function (string $search) {
//     return $search;
// })->where('search', '.*');

// Route::get('/user/{id}/profile', function (string $id) {
//     return $id ;
// })->name('profile');
// Route::middleware(['cheese'])->group(function () {
//     Route::get('/test1', function () {
//         return "HEllo";
//     });

//     Route::get('/test2', function () {
//       return "World";
//     });
// });
// Route::name('admin.')->group(function () {
//     Route::get('/users', function () {
//         return "admin.users";
//     })->name('users');
// });


// Route::get('/users/{user}', function (User $user) {
//     return $user->email;
// });

//Soft Deleted Models
// Route::get('/users/{user:name}', function (User $user) {
//     return $user->email;
// })->withTrashed();
// Route::get('/users/{user}/posts/{post}', function (User $user, Email $email) {
//     return $email;
// })->scopeBindings();
// Route::get('/users/{user:name}', function (User $user) {
//     return $user->email;
// });

    Route::get('/users/{user:name}', function (User $user) {
        $route = Route::current();
      return "HI";
}) ->middleware("ensureRole:user");

Route::get("/test2", [TestController::class , "middlewareTest"]);
Route::get('/posts/popular', [PostController::class, 'popular']);
Route::resource('posts', PostController::class)->missing(function (Request $request) {
    return Redirect::route('posts.index');
});;


