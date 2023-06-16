<?php


use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Route;
use App\Http\Requests\RegisterRequest;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\front\PostController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\users\PostController as UsersPostController;

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


Route::get('/', [HomeController::class, 'welcome'])->name('welcome');


Route::get('/front/posts', [PostController::class, 'index'])->name('front.posts.index');
Route::get('/front/post/{post}', [PostController::class, 'show'])->name('front.posts.show');

Route::middleware(['guest'])->group(function () {
    Route::get('/users/register', [RegisterController::class, 'show'])->name('register.show');
    Route::post('/register', [RegisterController::class, 'register'])->name('register.perform');
    Route::get('/users/login', [LoginController::class, 'show'])->name('login.show');
    Route::post('/login', [LoginController::class, 'login'])->name('login.perform');
});


route::middleware(['auth'])->group(function () {

    Route::post('/comments/store/{id}', [CommentController::class, 'store'])->name('comments.store');
    Route::post('/comments/delete/{comment}',[CommentController::class, 'delete'])->name('comments.delete');
    Route::post('comments/upfate/{comment}',[CommentController::class,'update'])->name ('comments.update');
    Route::post('/logout', [LogoutController::class, 'perform'])->name('logout.perform');
});

Route::get('/email/verify/{id}', function ($id) {
    DB::table('users')->where('id',$id)->update([
        'email_verified_at' => Carbon::now()
    ]);
    redirect()->route('welcome');

    return redirect('/');
});



Route::middleware(['guest'])->group(function(){
    Route::get('/users/forgot-password',[ResetPasswordController::class,'showEmail'])->name('password.request');
    Route::post('/forgot-password',[ResetPasswordController::class,'emailRequest'])->name('password.email');
    Route::get('/reset-password/{token}',[ResetPasswordController::class,'showPassword'])->name('password.reset');
    Route::post('/reset-password',[ResetPasswordController::class,'ressetPassword'])->name('password.update');
});


Route::get('/test',function(){
    $user = User::where('email', 'admin@admin.com')->firstOrFail();
    $user->update(['password'=>'password']);
    dd($user);
});
Route::prefix('users/posts')->as('users.posts.')->middleware(['auth'])->group(function(){
    Route::get('/', [UsersPostController::class, 'index'])->name('index');
    Route::get('/create', [UsersPostController::class, 'create'])->name('create');
    Route::post('/store', [UsersPostController::class, 'store'])->name('store');
    Route::get('/edit/{post}', [UsersPostController::class, 'edit'])->name('edit');
    Route::post('/update', [UsersPostController::class, 'update'])->name('update');
    Route::post('/delete/{post}', [UsersPostController::class, 'delete'])->name('delete');
});
