<?php

namespace App\Http\Controllers;

use App\Book;
use App\Setting;

class FrontController extends Controller
{
	protected $books;

	private function hide_email($email) {
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

    public function home() {
    	//$settings = Setting::first();
    	//$books = Book::get();
    	//$currentbook = Book::first();
      //return view('front.book', ['books'=>$books, 'settings'=>$settings,'currentbook'=>$currentbook]);
      return view('front');
    }

    public function book($id) {
    	$settings = Setting::first();
    	$books = Book::get();
    	$currentbook = Book::where('id', $id)->firstOrFail();
    	return view('front.book', ['books'=>$books, 'settings'=>$settings,'currentbook'=>$currentbook]);
    }

    public function info() {
    	$settings = Setting::first();
    	$books = Book::get();
    	return view('front.info', ['books'=>$books, 'settings'=>$settings, 'cleanEmail'=>Self::hide_email($settings->email)]);
    }

}
