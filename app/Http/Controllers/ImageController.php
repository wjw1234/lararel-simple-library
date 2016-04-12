<?php

namespace App\Http\Controllers;

use App\Album;
use App\Image as Images;
use Validator;
use Redirect;
use Input;
use Image;

class ImagesController extends Controller{

  public function getForm($id)
  {
    $album = Album::find($id);

    return view('admin.addimage', ['album'=>$album]);
  }

  public function postAdd()
  {
    $rules = array(

      'album_id' => 'required|numeric|exists:albums,id',
      'image'=>'required|image'

    );

    $validator = Validator::make(Input::all(), $rules);
    if($validator->fails()){

      return Redirect::route('add_image',array('id' =>Input::get('album_id')))
      ->withErrors($validator)
      ->withInput();
    }

    $file = Input::file('image');
    $random_name = str_random(8);
    $destinationPath = 'albums/';
    $extension = $file->getClientOriginalExtension();
    $filename=$random_name.'_album_image.'.$extension;
    $uploadSuccess = Input::file('image')->move($destinationPath, $filename);

    $img = Image::make($destinationPath . $filename);
    $img->resize(200, null, function ($constraint) {
        $constraint->aspectRatio();
        $constraint->upsize();
    });
    $filename200=$random_name.'_album_image.200.'.$extension;
    $img->save($destinationPath . $filename200);

    Images::create(array(
      'description' => Input::get('description'),
      'image' => $filename,
      'album_id'=> Input::get('album_id')
    ));

    return Redirect::route('show_album',array('id'=>Input::get('album_id')));
  }
  public function getDelete($id)
  {
    $image = Images::find($id);

    $image->delete();
    
    return Redirect::route('show_album',array('id'=>$image->album_id));
  }
  public function postMove()
  {
    $rules = array(
      'new_album' => 'required|numeric|exists:albums,id',
      'photo'=>'required|numeric|exists:images,id'
    );
    $validator = Validator::make(Input::all(), $rules);
    if($validator->fails()){
    
      return Redirect::route('index');
    }
    $image = Images::find(Input::get('photo'));
    $image->album_id = Input::get('new_album');
    $image->save();
    return Redirect::route('show_album',array('id'=>Input::get('new_album')));
  }
}