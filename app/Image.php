<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model {
  
  	protected $table = 'images';
  
  	protected $fillable = array('album_id','description','image');

  	public function coverImage200() {
  		$path_parts = pathinfo($this->image);
  		return $path_parts['filename'] . '.200.' . $path_parts['extension'];
  	}

  	public function image1200() {
  		$path_parts = pathinfo($this->image);
  		return $path_parts['filename'] . '.1200.' . $path_parts['extension'];
  	}
  
}