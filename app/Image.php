<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model {
  
  protected $table = 'images';
  
  protected $fillable = array('album_id','description','image');
  
}