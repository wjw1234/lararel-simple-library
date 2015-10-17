<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model {

    protected $table = 'slides';

    public function images() {
    	return $this->hasMany('App\SlideImage')->orderBy('order', 'ASC');
    }

}