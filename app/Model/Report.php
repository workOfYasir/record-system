<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
   public function expense()
   {
      return $this->belongsTo(Expense::class,'expense_id');
   }
   public function income()
   {
      return $this->belongsTo(Income::class,'income_id');
   }
   public function borrow()
   {
      return $this->belongsTo(Borrow::class,'borrow_id');
   }
   
}
