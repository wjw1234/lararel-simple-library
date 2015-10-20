<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Setting extends Model {

    protected $table = 'site_settings';

    protected $fillable = array('fax', 'address', 'site_title', 'video_url', 'phone', 'email', 'instagram', 'tumblr');

}