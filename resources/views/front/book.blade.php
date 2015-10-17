@extends('front')

@section('content')

	@foreach ($currentbook->slides as $slide)
        @foreach ($slide->images as $image)
            <img src="{!! url('/images/uploaded/'.$image->file->file) !!}" />
        @endforeach
    @endforeach

@endsection
