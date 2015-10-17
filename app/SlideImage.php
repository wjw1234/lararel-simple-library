<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SlideImage extends Model {

    protected $table = 'slide_images';

    public function file() {
    	return $this->HasOne('App\File', 'id', 'image_id');
    }

}