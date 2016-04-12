@extends('admin')

@section('content')

    <div class="container">
        <div class="row">    
            <div class="col-md-12">
                <div class="pull-left dashboard-album-cover" style="background-image:url({!! url('/albums/' . $album->coverImage200()) !!})"></div>
                <div class="">
                    <h4>Album Name:</h4>
                    <p>{!! $album->name !!}</p>
                    <h4>Album Description:</h4>
                    <p>{!! $album->description !!}</p>
                    <a href="{!! URL::route('add_image',array('id'=>$album->id)) !!}"><button type="button"class="btn btn-primary">Add New Image to Album</button></a>
                    <a href="{!! URL::route('delete_album',array('id'=>$album->id)) !!}" onclick="return confirm('Are yousure?')"><button type="button"class="btn btn-danger">Delete Album</button></a>
                </div>
            </div>
        </div>
        @foreach($album->Photos->chunk(4) as $chunk)
            <div class="row">
                @foreach ($chunk as $photo)
                    <div class="col-md-3">
                        <div class="dashboard-image-description">
                            <div class="dashboard-album-image" style="background-image:url({!! url('/albums/' . $photo->coverImage200()) !!})"></div>
                            <p>{!! strlen($photo->description) ? $photo->description : 'No description' !!}</p>
                            <p>{!! date("d F Y", strtotime($photo->created_at)) !!} at {!! date("g:ha", strtotime($photo->created_at)) !!}</p>
                            <p>Move to another Album:</p>
                            <form name="movephoto" method="POST"action="{!! URL::route('move_image') !!}">
                                <p>
                                  {!! Form::token() !!}
                                  <select name="new_album">
                                      @foreach($albums as $others)
                                          <option value="{!! $others->id !!}">{!! $others->name !!}</option>
                                      @endforeach
                                  </select>
                                  <input type="hidden" name="photo"value="{!! $photo->id !!}" />
                                  <button type="submit" class="btn btn-smallbtn-info" onclick="return confirm('Are you sure?')">Move Image</button>
                                </p>
                            </form>
                            <p><a href="{!! URL::route('delete_image',array('id'=>$photo->id)) !!}" onclick="returnconfirm('Are you sure?')"><button type="button"class="btn btn-danger btn-small">Delete</button></a></p>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
@endsection