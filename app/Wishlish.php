<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wishlish extends Model
{
     protected $table = "wishlists";

    public function user(){
       return $this->belongsTo("App\User");
    }

    public function product(){
       return $this->belongsTo("App\Product");
    }
}
