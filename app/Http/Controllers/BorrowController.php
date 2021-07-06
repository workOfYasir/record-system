<?php

namespace App\Http\Controllers;
use App\Model\Borrow;
use Illuminate\Http\Request;

class BorrowController extends Controller
{
    public function index(){
        $borrow = Borrow::all();
        return view('admin.pages.borrow.index')->with('borrow',$borrow);
    }
    public function create(){
        return view('admin.pages.borrow.create');
    }
    public function store(Request $request){

        $borrow = new Borrow();
        $borrow->user_id=auth()->user()->id;
        $borrow->name=$request->name;
        $borrow->description=$request->description;
        $borrow->borrowed_name=$request->borrowedName;
        $borrow->money=$request->money;
        $borrow->date=$request->date;  
        if($request->borrowedToggle=='on')
        {
            $borrow->borrow_toggle='Borrow';
        }else{
            $borrow->borrow_toggle='Lend';
        }
        
        if($borrow->save()){
            return redirect()->back()->with('success','Borrow is Added successfully');
        }else{
            return  redirect()->back()->with('error','Borrow is not Added, check all fields again');
        }
    }
    public function edit($id){
        $editborrow = Borrow::find($id);
        return view('admin.pages.borrow.create',compact('editborrow'));
    }
    public function update(Request $request,  $id)
    {
        if($request->borrowedToggle=='on')
        {
            $borrowToggle='Borrow';
        }else{
            $borrowToggle='Lend';
        }
        $borrow = Borrow::where('id', $id)->update([

        
            'name'=> $request->name,
            'description'=> $request->description,
            'borrowed_name'=> $request->borrowedName,
            'money'=>$request->money,
            'date'=>$request->date,
            'borrow_toggle'=>$borrowToggle,

        ]);
        if($borrow){
            return redirect()->back()->with('success','Borrow is Update successfully');
        }else{
            return  redirect()->back()->with('error','Borrow is not Update, check all fields again');
        }

        return back()->with('message','Borrow is Updated');
    }
    public function delete($id)
    {
        $borrow = Borrow::findOrFail($id);
        $borrow->delete();
        if($borrow){
            return redirect()->back()->with('success','Expense Category is Deleted successfully');
        }else{
            return  redirect()->back()->with('error','Expense Category is not Update, check all fields again');
        }

    }
}
