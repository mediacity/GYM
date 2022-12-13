<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Subquotation extends Model
{
    use SoftDeletes;
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $fillable = [
        'quotation_id', 'productname' , 'quantity' , 'price' , 'total', 
    ];
    public function quotation()
     {
         return $this->belongsTo('App\Quotation','quotation_id' ,'id');
     }
    
}
