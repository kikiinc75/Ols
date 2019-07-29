<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Categorie;
use App\SaleItem;

class Product extends Model
{
    protected $primaryKey = 'id';
    protected $casts = ['created_at' => 'datetime:Y-m-d H:i:s'];
    protected $hidden = ['updated_at'];
    protected $appends = ['image_url'];

    // hidden rule
    public $hide_slim = ['created_at','description','image','level','parent_id'];

    public function categorie(){
        return $this->belongsTo("App\Categorie");
    }

    public function saleItem(){
        return $this->belongsTo("App\SaleItem");
    }

     public function notif(){
        return $this->belongsTo("App\Notif");
    }

    public function varians(){
        return $this->hasMany('App\Product','parent_id','id');
    }
    public function cart(){
        return $this->hasMany('App\cart');
    }

    // public function getImageAttribute($val){
        
    // }
}
