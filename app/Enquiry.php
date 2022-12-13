<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Str;

class Enquiry extends Model
{
    use SoftDeletes;
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $casts=[
        'issue' => 'array',
    ];
    protected $fillable = [
        'enid','user_id' , 'f_name', 'email', 'mobile', 'phone', 'country_id' , 'state_id' , 'city_id' , 'address' , 'pincode' , 
        'dob' , 'purpose' , 'details' , 'description' , 'issue' , 'date' , 'next_date', 'cost_id', 'religion_id' , 'occupation_id','is_active','status','second_language', 'refrence'
    ];
    
    public static function geneateEnquiryID()
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
    public function user(){
        return $this->belongsTo('App\User', 'user_id', 'id');
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
    public function enquiryhealth(){
        return $this->belongsTo('App\Enquiryhealth', 'issue', 'id');
    }
    public function cost(){
        return $this->belongsTo('App\Cost', 'cost_id', 'id');
    }
    public function religion(){
        return $this->belongsTo('App\Religion', 'religion_id', 'id');
    }
    public function occupation(){
        return $this->belongsTo('App\Occupation', 'occupation_id', 'id');
    }
    public function Secondlanguage(){
        return $this->belongsTo('App\SecondLanguage', 'second_language', 'id');
    }
}
