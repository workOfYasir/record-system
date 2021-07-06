<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    public function childerns()
    {
       return $this->belongsTo(IncomeCategory::class,'category_id');
    }
}
