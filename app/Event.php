<?php
 namespace App; 
 use Illuminate\Database\Eloquent\Model; 
 class Event extends Model 
 { 
	protected $fillable = ['name','mobile_number','amount','email','status','order_id','transaction_id']; 
 } 
?>