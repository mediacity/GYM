<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CurrencyNew extends Model
{
    protected $table = 'currencies';
    public function currencyextract(){
        return $this->hasOne('App\Currency','currency_id','id');
    }
}
