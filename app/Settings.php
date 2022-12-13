<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    public $timestamps = false;
    protected $table = 'site_settings';
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $fillable = ['site_title','site_description','site_keyword','site_logo','site_favicon','support_email','site_copyright',
    'user_delete_cart','default_currency','right_click','inspect_element','login_side_image','login_description'];
   

    

}
