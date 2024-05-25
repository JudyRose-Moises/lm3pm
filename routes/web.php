<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Admin\addBookController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\viewBorrowedController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LibraryController;

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
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);


Route::get('/profile', [ProfileController::class, 'index'])->name('profile');


//sidebar route
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/book/search', [BookController::class, 'search'])->name('book.search');
Route::get('/payment', [PaymentController::class, 'index'])->name('payment');
Route::get('/history', [HistoryController::class, 'index'])->name('history');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

//admin side

Route::get('/admin/add',[addBookController::class,'viewAdd']);
Route::post('/admin/add',[addBookController::class,'addBook'])->name('admin.addbook');
Route::get('/admin/view1',[viewBorrowedController::class,'viewBorrowedeBooks']);

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/addbook',[addBookController::class,'viewAdd']);
    Route::post('/admin/addbook',[addBookController::class,'addBook'])->name('admin.addbook');
    Route::get('/admin/library', [AdminController::class, 'library'])->name('admin.library');
    Route::get('/admin/view', [viewBorrowedController::class,'viewBorrowedeBooks']);
});

// Route for displaying all books (library)
Route::get('/library', [LibraryController::class, 'index'])->name('admin.library');
Route::get('/edit-book/{id}', [LibraryController::class, 'edit'])->name('admin.editbook');
Route::put('/update-book/{id}', [LibraryController::class, 'update'])->name('admin.updatebook');
Route::delete('/delete-book/{id}', [LibraryController::class, 'destroy'])->name('admin.deletebook');


Route::get('/book/borrowed', [BookController::class, 'viewBorrowed'])->name('book.borrow');
Route::post('/book/return/{id}', [BookController::class, 'returnBook'])->name('book.return');

//profile update
Route::get('/profile', [UserController::class, 'showProfile'])->name('profile');
Route::post('/profile/update', [UserController::class, 'updateProfile'])->name('profile.update');

//logout
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/book/search', [BookController::class, 'search'])->name('book.search');

Route::post('/book/borrow/{id}', [BorrowController::class, 'borrow'])->name('book.borrow');



// Apply auth middleware to protect these routes
Route::middleware(['auth'])->group(function () {
    Route::get('/profile/edit', [ProfileController::class, 'editProfile'])->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update');

Route::middleware('auth')->group(function () {
    Route::get('/return', [App\Http\Controllers\ReturnController::class, 'index'])->name('book.return.index');
    Route::post('/return/{id}', [App\Http\Controllers\BookController::class, 'returnBook'])->name('book.return');
    });

});
