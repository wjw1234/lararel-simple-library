<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Setting extends Model {

    protected $table = 'site_settings';

    protected $fillable = array('video_url', 'phone', 'email');

}