<?php

namespace App\Http\Controllers;

use App\Book;
use App\Setting;

class FrontController extends Controller
{
	protected $books;

    public function home() {
    	$settings = Setting::first();
    	$books = Book::get();
    	$currentbook = Book::first();
        return view('front.home', ['books'=>$books, 'settings'=>$settings,'currentbook'=>$currentbook]);
    }

    public function book($id) {
    	$settings = Setting::first();
    	$books = Book::get();
    	$currentbook = Book::where('id', $id)->firstOrFail();
    	return view('front.home', ['books'=>$books, 'settings'=>$settings,'currentbook'=>$currentbook]);
    }



}
