<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Album extends Model {

  protected $table = 'albums';

  protected $fillable = array('name','description','cover_image');

  public function Photos(){

    return $this->hasMany('App\Image');
  }
}