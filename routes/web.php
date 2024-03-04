<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\DashboardMemberController;
use App\Http\Controllers\DashboardOfficerController;
use Illuminate\Support\Facades\Route;

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
    return redirect('/login');
});

Route::get('/logout', [AuthController::class, 'logout']); 

Route::middleware(['guest'])->group(function () {
    // Route::match(['get', 'post'], '/login', [AuthController::class, 'login']);
    Route::get('/login', [AuthController::class, 'showLogin']);
    Route::post('/login', [AuthController::class, 'submitLogin']);
    Route::match(['get', 'post'], '/register', [AuthController::class, 'register']);
});

Route::middleware(['role:admin'])->group(function () {
    Route::get('/dashboard-admin', [DashboardAdminController::class, 'index']);
    Route::post('/dashboard/user/change-access-status-user', [DashboardAdminController::class, 'changeAccessStatusUser']); 
    
    Route::get('/dashboard-admin/user', [DashboardAdminController::class, 'user']);
    
    Route::get('/dashboard-admin/book', [DashboardAdminController::class, 'book']);
    Route::get('/dashboard-admin/book/delete/{book_id}', [DashboardAdminController::class, 'bookDelete']);
    Route::get('/dashboard-admin/book/rating/{book_id}', [DashboardAdminController::class, 'rating']);
    Route::get('/dashboard-admin/book/rating/delete/{book_id}', [DashboardAdminController::class, 'ratingDelete']);
    Route::match(['get', 'post'], '/dashboard-admin/book/create', [DashboardAdminController::class, 'bookCreate']);
    Route::match(['get', 'post'], '/dashboard-admin/book/edit/{slug}', [DashboardAdminController::class, 'bookEdit']);
    
    Route::match(['get', 'post'], '/dashboard-admin/category/create', [DashboardAdminController::class, 'categoryCreate']);
    Route::match(['get', 'post'], '/dashboard-admin/category/edit/{slug}', [DashboardAdminController::class, 'categoryEdit']);
    Route::match(['get', 'post'], '/dashboard-admin/category/edit/{slug}', [DashboardAdminController::class, 'categoryEdit']);
    Route::get('/dashboard-admin/category', [DashboardAdminController::class, 'category']);
    Route::get('/dashboard-admin/category/delete/{slug}', [DashboardAdminController::class, 'categoryDelete']);

    Route::get('/dashboard-admin/borrowing', [DashboardAdminController::class, 'borrowing']);

    Route::get('/dashboard-admin/generate-report', [DashboardAdminController::class, 'generateReport']);
    Route::get('/generate-excel-admin', [DashboardAdminController::class, 'generateExcel']);
});

Route::middleware(['role:member'])->group(function () {
    Route::get('/dashboard-member', [DashboardMemberController::class, 'index']);

    Route::get('/dashboard-member/book', [DashboardMemberController::class, 'book']);
    Route::get('/dashboard-member/book/rating/{book_id}', [DashboardMemberController::class, 'rating']);

    Route::get('/dashboard-member/private-collection', [DashboardMemberController::class, 'privateCollection']);
    Route::get('/dashboard-member/private-collection/create', [DashboardMemberController::class, 'privateCollectionCreate']);
    Route::get('/dashboard-member/private-collection/delete', [DashboardMemberController::class, 'privateCollectionDelete']);
    
    Route::get('/dashboard-member/borrowing', [DashboardMemberController::class, 'borrowing']);
    Route::get('/dashboard-member/borrowing/create', [DashboardMemberController::class, 'borrowingCreate']);

    Route::match(['get', 'post'], '/dashboard-member/return/{slug}', [DashboardMemberController::class, 'return']);
    

});

Route::middleware(['role:officer'])->group(function () {

    Route::get('/dashboard-officer', [DashboardOfficerController::class, 'index']);

    Route::get('/dashboard-officer/book', [DashboardOfficerController::class, 'book']);
    Route::get('/dashboard-officer/book/delete/{book_id}', [DashboardOfficerController::class, 'bookDelete']);
    Route::get('/dashboard-officer/book/rating/{book_id}', [DashboardOfficerController::class, 'rating']);
    Route::get('/dashboard-officer/book/rating/delete/{book_id}', [DashboardOfficerController::class, 'ratingDelete']);
    Route::match(['get', 'post'], '/dashboard-officer/book/create', [DashboardOfficerController::class, 'bookCreate']);
    Route::match(['get', 'post'], '/dashboard-officer/book/edit/{slug}', [DashboardOfficerController::class, 'bookEdit']);

    Route::match(['get', 'post'], '/dashboard-officer/category/create', [DashboardOfficerController::class, 'categoryCreate']);
    Route::match(['get', 'post'], '/dashboard-officer/category/edit/{slug}', [DashboardOfficerController::class, 'categoryEdit']);
    Route::match(['get', 'post'], '/dashboard-officer/category/edit/{slug}', [DashboardOfficerController::class, 'categoryEdit']);
    Route::get('/dashboard-officer/category', [DashboardOfficerController::class, 'category']);
    Route::get('/dashboard-officer/category/delete/{slug}', [DashboardOfficerController::class, 'categoryDelete']);    

    Route::get('/dashboard-officer/borrowing', [DashboardOfficerController::class, 'borrowing']);

    Route::get('/dashboard-officer/generate-report', [DashboardOfficerController::class, 'generateReport']);
    Route::get('/generate-excel-officer', [DashboardOfficerController::class, 'generateExcel']);

    
});
