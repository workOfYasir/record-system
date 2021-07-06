<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Income;
use App\Model\IncomeCategory;

class IncomeController extends Controller
{
    public function index(){
        $income = Income::with('childerns')->get();
        return view('admin.pages.income.index',compact('income'));
    }
    public function create(){
        $category = IncomeCategory::all();
        return view('admin.pages.income.create')->with('categories',$category);;
    }
    public function store(Request $request){
        $income = new Income;
        $income->user_id=auth()->user()->id;
        $income->name=$request->name;
        $income->description=$request->description;
        $income->category_id=$request->category;
        $income->money=$request->money;
        $income->date=$request->date;
        if($income->save()){
            return redirect()->back()->with('success','Income is Added successfully');
        }else{
            return  redirect()->back()->with('error','Income is not Added, check all fields again');
        }

    }
    public function edit($id){
        $editincome = Income::with('childerns')->find($id);
        $categories = IncomeCategory::all();
        // return ($category);
        return view('admin.pages.income.create',compact('editincome','categories'));
    }
    public function update(Request $request,  $id)
    {
        $income = Income::where('id', $id)->update([
            'name'=> $request->name,
            'description'=> $request->description,
            'category_id'=> $request->category,
            'money'=>$request->money,
            'date'=>$request->date,
        ]);
        if($income){
            return redirect()->back()->with('success','Income is Update successfully');
        }else{
            return  redirect()->back()->with('error','Income is not Update, check all fields again');
        }

        return back()->with('message','Income is Updated');
    }
    public function delete($id)
    {
        $income = Income::findOrFail($id);
        $income->delete();
        if($income){
            return redirect()->back()->with('success','Income is Deleted successfully');
        }else{
            return  redirect()->back()->with('error','Income is not Update, check all fields again');
        }

    }
    
}
