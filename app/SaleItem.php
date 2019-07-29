<?php

namespace App;
use App\Sale ; 
use App\Product ; 

use Illuminate\Database\Eloquent\Model;

class SaleItem extends Model
{
	protected $primaryKey = 'id';
    public function sale()
    {
    	return $this->belongsTo("App\Sale");
    }

    public function product()
    {
    	return $this->belongsTo("App\Product");
    }
}
