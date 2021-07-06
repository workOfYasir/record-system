<?php

use App\Http\Controllers\ExpenseCategoryController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\IncomeCategoryController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

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


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => ['auth']], function() {
    Route::group(['prefix'=>'/'], function () {
        /** Report **/
        Route::get('/',[ReportController::class,'index'])->name('dashboard');
        /** expense and it's category **/
        Route::get('/expense/create',[ExpenseController::class,'create'])->name('expense');
        Route::post('/expense/store',[ExpenseController::class,'store'])->name('store.expense');
        Route::get('/expense/view',[ExpenseController::class,'index'])->name('view.expense');
        Route::get('/expense/edit/{id}',[ExpenseController::class,'edit'])->name('edit.expense');
        Route::put('/expense/update/{id}',[ExpenseController::class,'update'])->name('update.expense');
        Route::get('/expense/delete/{id}',[ExpenseController::class,'delete'])->name('delete.expense');
        Route::get('/expense/category/view',[ExpenseCategoryController::class,'index'])->name('view.expenseCategory');
        Route::get('/expense/category/create',[ExpenseCategoryController::class,'create'])->name('create.expenseCategory');
        Route::post('/expense/category/store',[ExpenseCategoryController::class,'store'])->name('store.expenseCategory');
        Route::get('/expense/category/edit/{id}',[ExpenseCategoryController::class,'edit'])->name('edit.expenseCategory');
        Route::put('/expense/category/update/{id}',[ExpenseCategoryController::class,'update'])->name('update.expenseCategory');
        Route::get('/expense/category/delete/{id}',[ExpenseCategoryController::class,'delete'])->name('delete.expenseCategory');
        /** income & it's category **/
        Route::get('/income/create',[IncomeController::class,'create'])->name('income');
        Route::post('/income/store',[IncomeController::class,'store'])->name('store.income');
        Route::get('/income/view',[IncomeController::class,'index'])->name('view.income');
        Route::get('/income/edit/{id}',[IncomeController::class,'edit'])->name('edit.income');
        Route::put('/income/update/{id}',[IncomeController::class,'update'])->name('update.income');
        Route::get('/income/delete/{id}',[IncomeController::class,'delete'])->name('delete.income');
        Route::get('/income/category/view',[IncomeCategoryController::class,'index'])->name('view.incomeCategory');
        Route::get('/income/category/create',[IncomeCategoryController::class,'create'])->name('create.incomeCategory');
        Route::post('/income/category/store',[IncomeCategoryController::class,'store'])->name('store.incomeCategory');
        Route::get('/income/category/edit/{id}',[IncomeCategoryController::class,'edit'])->name('edit.incomeCategory');
        Route::put('/income/category/update/{id}',[IncomeCategoryController::class,'update'])->name('update.incomeCategory');
        Route::get('/income/category/delete/{id}',[IncomeCategoryController::class,'delete'])->name('delete.incomeCategory');
        /** borrow **/
        Route::get('/borrow/create',[BorrowController::class,'create'])->name('borrow');
        Route::post('/borrow/store',[BorrowController::class,'store'])->name('store.borrow');
        Route::get('/borrow/view',[BorrowController::class,'index'])->name('view.borrow');
        Route::get('/borrow/edit/{id}',[BorrowController::class,'edit'])->name('edit.borrow');
        Route::put('/borrow/update/{id}',[BorrowController::class,'update'])->name('update.borrow');
        Route::get('/borrow/delete/{id}',[BorrowController::class,'delete'])->name('delete.borrow');
        
    });
    Route::get('logout', [LoginController::class,'logout'])->name('logout');
});
