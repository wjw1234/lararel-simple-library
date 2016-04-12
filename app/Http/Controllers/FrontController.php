<?php

namespace App\Http\Controllers;

use App\Album;
use App\Book;
use App\Setting;

class FrontController extends Controller
{
	  protected $books;

    public function home() {
    	//$books = Book::get();
    	//$currentbook = Book::first();
      //return view('front.book', ['books'=>$books, 'settings'=>$settings,'currentbook'=>$currentbook]);
      return view('front', [
                            'albums'   => Album::with('Photos')->get(),
                            'settings' => $settings = Setting::first()
                            ]);
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
