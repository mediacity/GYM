<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogCategory extends Model
{
  use SoftDeletes;
  /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
  protected $fillable = [
  	'title','slug','image','detail','is_active'
  ];
  public function blogs()
  {
		return $this->hasMany('\App\Models\Blog','blog_cat_id');
  }
}
