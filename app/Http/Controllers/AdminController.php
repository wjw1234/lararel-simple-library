<?php

namespace App\Http\Controllers;

use App\Book;

class AdminController extends Controller
{

    protected $books;

    public function __construct()
    {
        $this->books = Book::get();
    }

    public function home() {
        return view('admin.home', ['books'=>$this->books]);
    }

    public function book($id) {
        return view('admin.book', ['currentbook'=>$id,'books'=>$this->books]);
    }

    public function settings() {
    	return view('admin.settings', ['page'=>'settings','books'=>$this->books]);
    }

}
