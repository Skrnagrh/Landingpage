<?php

use App\Http\Controllers\ProspectController;
use App\Http\Controllers\StartupController;
use App\Http\Controllers\DashboardNewsController;
use App\Http\Controllers\DashboardProspectController;
use App\Http\Controllers\DashboardStartupController;
use App\Http\Controllers\DashboardWorkController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\DashboardApplyController;
use App\Http\Controllers\AdminRegisterController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\WorkController;
use App\Http\Controllers\CetakController;
use Illuminate\Support\Facades\Route;
use App\Models\Category;
use App\Models\Prospect;
use App\Models\News;
use App\Models\Startup;
use App\Models\Work;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Halaman Home
Route::get('/', function () {
    return view('home', [
        "title" => "Home",
        "active" => "home",
        "news" => News::latest()->paginate(3)->withQueryString(),
        "prospect" => Prospect::all(),
        "startup" => Startup::all()

    ]);
});

// Untuk Melihat Detail Jobs Prospect
Route::get('/detail_prospect/{prospect:slug}', [ProspectController::class, 'show']);

// Halaman Startup
Route::get('/startup', function () {
    return view('startup', [
        "title" => "Startup",
        "active" => "startup",
        "startup" => Startup::all()
    ]);
});

Route::get('/detail_startup/{startup:slug}', [StartupController::class, 'detail']);

// Halaman Work
Route::get('/work', function () {
    return view('work', [
        "title" => "Work",
        "active" => "work",
        "work" => Work::latest()->paginate(12),
        "startup" => Startup::all()
    ]);
});

Route::get('/contact', function () {
    return view('contact', [
        "title" => "Contact",
        "active" => "contact",
        // "work" => Work::latest()->paginate(12),
        // "startup" => Startup::all()
    ]);
});

Route::get('/detail_work/{work:slug}', [WorkController::class, 'detail']);

Route::get('/applywork/{work:slug}', [WorkController::class, 'send']);
Route::post('/applywork', [WorkController::class, 'apply']);


// Halaman Berita
Route::get('/news', [NewsController::class, 'index']);
Route::get('news/{news:slug}', [NewsController::class, 'show']);


// Halaman Categories 
Route::get('/categories', function () {
    return view('categories', [
        'title' => 'Categories',
        'active' => 'categories',
        'categories' => Category::all()
    ]);
});


// ini buat sudah login
// login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

// Register
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

// Halaman Dashboard Admin
Route::get('/dashboard', function () {
    return view('dashboard.index', [
        "active" => 'dashboard',
        "user" => User::all()
    ]);
})->middleware('auth');

// untuk Halaman Admin Kelola Berita
Route::resource('/dashboard/news', DashboardNewsController::class)->middleware('auth');
Route::get('/dashboard/news/checkSlug', [DashboardNewsController::class, 'checkSlug'])->middleware('auth');

// Route::get('/dashboard/apply/cetak', [DashboardApplyController::class, 'cetak'])->middleware('auth');

// Halaman Jobs Prospect
Route::resource('/dashboard/prospect', DashboardProspectController::class)->middleware('auth');
// Route::get('/dashboard/prospect/checkSlug', [DashboardProspectController::class, 'checkSlug'])->middleware('auth');

// Halaman Startup
Route::resource('/dashboard/startup', DashboardStartupController::class)->middleware('auth');

// dahboarrd Work
Route::resource('/dashboard/work', DashboardWorkController::class)->middleware('auth');

Route::resource('/dashboard/user', DashboardUserController::class)->middleware('auth');

// Halaman Dashboard Admin
Route::resource('/dashboard/register', AdminRegisterController::class)->middleware('auth');

Route::resource('/dashboard/categories', AdminCategoryController::class)->middleware('auth');

Route::resource('/dashboard/apply', DashboardApplyController::class)->middleware('auth');

