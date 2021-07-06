<?php

namespace App\Http\Controllers;

use App\Model\ExpenseCategory;
use Illuminate\Http\Request;

class ExpenseCategoryController extends Controller
{
    public function index(){
        $expenseCategory = ExpenseCategory::all();
        return view('admin.pages.expenseCategory.index')->with('expenseCategory',$expenseCategory);
    }
    public function create(){
        return view('admin.pages.expenseCategory.create');
    }
    public function store(Request $request){

        $expenseCategory = new ExpenseCategory();
        $expenseCategory->name=$request->name;     
        if($expenseCategory->save()){
            return redirect()->back()->with('success','Expense Category is Added successfully');
        }else{
            return  redirect()->back()->with('error','Expense Category is not Added, check all fields again');
        }
    }
    public function edit($id){
        $expenseCategory = ExpenseCategory::find($id);
        return view('admin.pages.expenseCategory.create',compact('expenseCategory'));
    }
    public function update(Request $request,  $id)
    {
        $expenseCategory = ExpenseCategory::where('id', $id)->update([

            'name'=> $request->name,

        ]);
        if($expenseCategory){
            return redirect()->back()->with('success','Expense Category is Update successfully');
        }else{
            return  redirect()->back()->with('error','Expense Category is not Update, check all fields again');
        }

        return back()->with('message','Expense is Updated');
    }
    public function delete($id)
    {
        $expenseCategory = ExpenseCategory::findOrFail($id);
        $expenseCategory->delete();
        if($expenseCategory){
            return redirect()->back()->with('success','Expense Category is Deleted successfully');
        }else{
            return  redirect()->back()->with('error','Expense Category is not Update, check all fields again');
        }

    }
}
