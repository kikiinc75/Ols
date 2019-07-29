<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\SaleItem;
use App\Product ; 
class Sale extends Model
{
    protected $primaryKey = 'id';
	
    public function saleItem()
    {
    	return $this->hasMany('App\SaleItem');
    }

     public function product()
    {
    	return $this->belongsTo("App\Product");
    }
    public function notif(){
        return $this->hasMany('App\Notif');
    }
}
