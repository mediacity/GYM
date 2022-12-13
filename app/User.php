<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Passport\HasApiTokens;
use App\Affilates;
use Str;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Eloquent\SoftDeletes;
use SamuelNitsche\AuthLog\AuthLogable;
class User extends Authenticatable
{
    use SoftDeletes;
    use Notifiable;
    use HasRoles;
    use HasApiTokens,AuthLogable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $casts=[
        'issue' => 'array',
        'email_verified_at' => 'datetime',
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $fillable = [
    'id' ,'name', 'email', 'password','line1','line2','pincode','country_id','is_active','state_id','city_id','designation','mobile','gender','dob','photo','uuid','membership','demo', 'refer_code','refer_from','issue','file','remember_token','isVerified'
    ];
    protected $affilates=[
     'ref_id'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public static function createReferCode()
    {
        
    $seed = str_split('abcdefghijklmnopqrstuvwxyz'
            . 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'
            . '0123456789!$&'); 
        shuffle($seed); 
        $rand = '';
        $affilate =Affilates::first();
        $ref_id = $affilate->ref_id;
        foreach (array_rand($seed , $ref_id) as $k) {
            $rand .= $seed[$k];
        }
        return Str::upper($rand);
    }
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
   public function state(){
        return $this->belongsTo('App\State','state_id','id');
    }
    public function country(){
        return $this->belongsTo('App\Country','country_id','id');
    }
    public function city(){
        return $this->belongsTo('App\City','city_id','id');
    }
    public function trainerpackages()
    {
    return $this->belongsTo('App\Trainerpackages','trainer_name' ,'id');
    }

    public function locker()
    {
        return $this->hasMany('App\Locker','userid');
    }
    public function enquiryhealth(){
        return $this->belongsTo('App\Enquiryhealth', 'issue', 'id');
    }
     public function role()
	  {
			return $this->belongsTo('\App\Role','role_id')->withDefault();
	  }
      public function getReferals(){
        return $this->hasMany('App\AffilateHistory','user_id');
    }
     public function onetimereferdata(){
        return $this->hasOne('App\AffilateHistory','refer_user_id','id');
    }
     public function routeNotificationForOneSignal()
    {
        return ['include_external_user_ids' => [$this->id.""]];
    }
    public function measurements(){
        return $this->hasMany('App\Measurement', 'user_id','id');
    }
}
