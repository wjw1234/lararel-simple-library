<?php

namespace App\Http\Controllers;

use App\Book;
use App\File;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AdminController extends Controller
{

    protected $books;
    protected $slides;
    protected $files;


    public function __construct()
    {
        $this->books = Book::get();
        $this->files = File::get();
    }

    public function home() {
        return view('admin.home', ['books'=>$this->books]);
    }

    public function book($id) {
    	$book = Book::where('id',$id)->firstOrFail();
        return view('admin.book', ['currentbook'=>$book,'books'=>$this->books]);
    }

    public function settings() {
    	return view('admin.settings', ['page'=>'settings','books'=>$this->books]);
    }

    public function images() {
        return view('admin.images', ['page'=>'images','books'=>$this->books,'images'=>$this->files]);
    }

    public function image($id) {
        return view('admin.image', ['currentbook'=>$id,'books'=>$this->books]);
    }

    static public function generateRandomString($length = 10) {
	    $characters = 'abcdefghijklmnopqrstuvwxyz';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}

    static public function slugify($text) { 
	  	// replace non letter or digits by -
	  	$text = preg_replace('~[^\\pL\d]+~u', '-', $text);
	  	// trim
	  	$text = trim($text, '-');
	  	// transliterate
	  	$text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
	  	// lowercase
	  	$text = strtolower($text);
	  	// remove unwanted characters
	  	$text = preg_replace('~[^-\w]+~', '', $text);
	  	if (empty($text)) {
	    	return Self::generateRandomString(5);
	  	}
	  	return $text;  
	}

    public function uploadImage(Request $request) {
    	// file was uploaded successfully
    	if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
    		// get file object
    		$file = $request->file('photo');
    		// separate extension and name
    		$temp = explode('.', $file->getClientOriginalName());
			$ext  = array_pop($temp);
			$name = implode('.', $temp);
			// slugify the name and lowercase the ext
    		$fileName = Self::slugify($name) . '.' . strtolower($ext);
    		$destinationPath = public_path('images/uploaded/');
    		if (file_exists($destinationPath . DIRECTORY_SEPARATOR . $fileName)) {
    			$fileName = Self::slugify($name) . '-' . Self::generateRandomString(5) . '.' . strtolower($ext);
    		}
    		// move to correct folder
    		$file->move($destinationPath, $fileName);
    		$i = new File;
    		$i->title = $request->input('title');
    		$i->file = $fileName;
    		$i->save();
    	}
    	return redirect('/dashboard/images');
    }

}
