<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Setting extends Model {

    protected $table = 'site_settings';

    protected $fillable = array('fax', 'address', 'site_title', 'video_url', 'phone', 'email', 'instagram', 'tumblr');

    public function safeEmailScript() {
    	$email = $this->email;
	    if (!strlen($email)) return false;
	    $character_set = '+-.0123456789@ABCDEFGHIJKLMNOPQRSTUVWXYZ_abcdefghijklmnopqrstuvwxyz';
	    $key = str_shuffle($character_set); $cipher_text = ''; $id = 'e'.rand(1,999999999);
	    for ($i=0;$i<strlen($email);$i+=1) $cipher_text.= $key[strpos($character_set,$email[$i])];
	    $script = 'var a="'.$key.'";var b=a.split("").sort().join("");var c="'.$cipher_text.'";var d="";';
	    $script.= 'for(var e=0;e<c.length;e++)d+=b.charAt(a.indexOf(c.charAt(e)));';
	    $script.= 'document.getElementById("'.$id.'").innerHTML="<a href=\\"mailto:"+d+"\\">"+d+"</a>"';
	    $script = "eval(\"".str_replace(array("\\",'"'),array("\\\\",'\"'), $script)."\")"; 
	    $script = '<script type="text/javascript">/*<![CDATA[*/'.$script.'/*]]>*/</script>';
	    return '<span id="'.$id.'">[javascript protected email address]</span>'.$script;
    }

}