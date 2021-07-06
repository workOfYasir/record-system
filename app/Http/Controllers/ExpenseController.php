<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Expense;
use App\Model\ExpenseCategory;

class ExpenseController extends Controller
{

    public function index(){
        $expense = Expense::with('childerns')->get();
        // dd($expense);
        return view('admin.pages.expenses.index',compact('expense'));
    }

    
    public function create(){
        $category = ExpenseCategory::all();
        return view('admin.pages.expenses.create')->with('categories',$category);;
    }
    public function store(Request $request){
        // dd($request->all());
        $expense = new Expense;
        $expense->user_id=auth()->user()->id;
        $expense->name=$request->name;
        $expense->description=$request->description;
        $expense->category_id=$request->category;
        $expense->money=$request->money;
        $expense->date=$request->date;
        if($expense->save()){
            return redirect()->back()->with('success','Expense is Added successfully');
        }else{
            return  redirect()->back()->with('error','Expense is not Added, check all fields again');
        }

    }
    public function edit($id){
        $editexpense = Expense::with('childerns')->find($id);
        $categories = ExpenseCategory::all();
        // return ($category);
        return view('admin.pages.expenses.create',compact('editexpense','categories'));
    }
    public function update(Request $request,  $id)
    {
        $expense = Expense::where('id', $id)->update([
            'name'=> $request->name,
            'description'=> $request->description,
            'category_id'=> $request->category,
            'money'=>$request->money,
            'date'=>$request->date,
        ]);
        if($expense){
            return redirect()->back()->with('success','Expense is Update successfully');
        }else{
            return  redirect()->back()->with('error','Expense is not Update, check all fields again');
        }

        return back()->with('message','Expense is Updated');
    }
    public function delete($id)
    {
        $expense = Expense::findOrFail($id);
        $expense->delete();
        if($expense){
            return redirect()->back()->with('success','Expense is Deleted successfully');
        }else{
            return  redirect()->back()->with('error','Expense is not Update, check all fields again');
        }

    }
    
}
