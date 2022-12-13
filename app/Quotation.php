<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quotation extends Model
{
    use SoftDeletes;
    protected $casts=[
        'details' => 'array',
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $fillable = [
        'quotation_id','customerid' , 'name', 'email', 'mobile', 'country_id' , 'state_id' , 'city_id' , 'address' , 'pincode' , 
        'date' , 'status' , 'additionalnote', 'subtotal' , 'shipping','grandtotal','tax','is_active','status',
    ];
    public static function geneateCustomerID()
    {
        $seed = str_split('abcdefghijklmnopqrstuvwxyz'
            . 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'
            . '0123456789!$&#');
        shuffle($seed);
        $rand = '';
        foreach (array_rand($seed, 6) as $k) {
            $rand .= $seed[$k];
        }
        return Str::upper($rand);
    }

   
    public function state(){
        return $this->belongsTo('App\State','state_id','id');
    }
    public function country(){
        return $this->belongsTo('App\Country','country_id','id');
    }
    public function city(){
        return $this->belongsTo('App\City','city_id','id');
    }
    public function subquotation()
    {
        return $this->hasMany('App\Subquotation','quotation_id');
    }
    public function invoice()
    {
        return $this->hasMany('App\Invoice','invoice_id');
    }
    public function setting()
    {
        return $this->belongsTo('App\Settings','id','id');
    }
    
}
