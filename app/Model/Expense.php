<?php

namespace App\Model;

use App\Model\ExpenseCategory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{

    public function childerns()
    {
       return $this->belongsTo(ExpenseCategory::class,'category_id');
    }

}
