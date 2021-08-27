<?php

namespace App\Http\Controllers;
use App\Model\Report;
use App\Model\Income;
use App\Model\Expense;
use App\Model\Borrow;
use App\Model\ExpenseCategory;
use App\Model\IncomeCategory;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $borrows = Borrow::all();
        $expenses = Expense::with('childerns')->get();
        $incomes = Income::with('childerns')->get();
        $borrowDate = Borrow::distinct()->pluck('date');
        $expenseDate = Expense::pluck('date')->union($borrowDate);
        $allDate = Income::pluck('date')->union($expenseDate);

        return view('admin.index',compact('borrows','expenses','incomes','allDate'));

    }
}