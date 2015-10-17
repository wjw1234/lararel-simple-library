<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model {

    protected $table = 'books';

    use SoftDeletes;

    public function slides() {
    	return $this->hasMany('App\Slide');
    }

}