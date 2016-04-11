<?php

namespace App\Http\Controllers;

use App\Album;
use App\Image;
use Validator;
use Input;
use Redirect;
use Illuminate\Http\Request;

class AlbumsController extends Controller{

    //protected $books;
    //protected $slides;
    //protected $files;
    protected $albums;

    public function __construct()
    {
        //$this->books = Book::get();
        //$this->files = File::get();
        $this->albums = Album::with('Photos')->orderBy('order')->get();
    }

  public function getList()
  {
    return view('admin.albumIndex', ['albums'=>$this->albums]);;
  }
  public function getAlbum($id)
  {
    $album = Album::with('Photos')->find($id);
    $albums = Album::with('Photos')->get();
    return view('admin.album', ['album'=>$album,'albums'=>$this->albums]);
  }
  public function getForm()
  {
    return view('admin.albumCreate', ['albums'=>$this->albums]);
  }
  public function postCreate()
  {
    $rules = array(

      'name' => 'required',
      'cover_image'=>'required|image'

    );
    
    $validator = Validator::make(Input::all(), $rules);
    if($validator->fails()){

      return Redirect::route('create_album_form')
      ->withErrors($validator)
      ->withInput();
    }

    $file = Input::file('cover_image');
    $random_name = str_random(8);
    $destinationPath = 'albums/';
    $extension = $file->getClientOriginalExtension();
    $filename=$random_name.'_cover.'.$extension;
    $uploadSuccess = Input::file('cover_image')
    ->move($destinationPath, $filename);
    $album = Album::create(array(
      'name' => Input::get('name'),
      'description' => Input::get('description'),
      'cover_image' => $filename,
    ));

    return Redirect::route('show_album',array('id'=>$album->id));
  }

  public function getDelete($id)
  {
    $album = Album::find($id);

    $album->delete();

    return Redirect::route('index');
  }

  public function order() {
    return view('admin.albumOrder', ['albums'=>$this->albums]);
  }

  public function orderSet(Request $request) {
        
        $json = $request->input('json');
        $object = json_decode($json);
        foreach ($object as $albumOrder => $albumObject) {
            $album_id = $albumObject->id;
            $album = Album::find(intval($album_id));
            if ($album) {
                var_dump($albumObject->id);
                var_dump($albumOrder);
                $album->order = $albumOrder;
                $album->save();
                foreach ($albumObject->images as $imageOrder => $imageId) {
                    $image = Image::find($imageId);
                    if ($image) {
                        $image->order = $imageOrder;
                        $image->save();
                    }
                }
            }
            
        }
    }
}