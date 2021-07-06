<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\IncomeCategory;

class IncomeCategoryController extends Controller
{
    public function index(){
        $incomeCategory = IncomeCategory::all();
        return view('admin.pages.incomeCategory.index')->with('incomeCategory',$incomeCategory);
    }
    public function create(){
        return view('admin.pages.incomeCategory.create');
    }
    public function store(Request $request){

        $incomeCategory = new IncomeCategory();
        $incomeCategory->name=$request->name;     
        if($incomeCategory->save()){
            return redirect()->back()->with('success','Income Category is Added successfully');
        }else{
            return  redirect()->back()->with('error','Income Category is not Added, check all fields again');
        }
    }
    public function edit($id){
        $incomeCategory = IncomeCategory::find($id);
        return view('admin.pages.incomeCategory.create',compact('incomeCategory'));
    }
    public function update(Request $request,  $id)
    {
        $incomeCategory = IncomeCategory::where('id', $id)->update([

            'name'=> $request->name,

        ]);
        if($incomeCategory){
            return redirect()->back()->with('success','Income Category is Update successfully');
        }else{
            return  redirect()->back()->with('error','Income Category is not Update, check all fields again');
        }

        return back()->with('message','Income is Updated');
    }
    public function delete($id)
    {
        $incomeCategory = IncomeCategory::findOrFail($id);
        $incomeCategory->delete();
        if($incomeCategory){
            return redirect()->back()->with('success','Income Category is Deleted successfully');
        }else{
            return  redirect()->back()->with('error','Income Category is not Update, check all fields again');
        }

    }
}
