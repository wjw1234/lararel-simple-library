@extends('admin')

@section('content')
   
<div class="container">

    <div class="col-md-12">

    <h2>Settings</h2>

    {!! BootForm::open()->action(url('/dashboard/settings')) !!}
    {!! BootForm::bind($settings) !!}
        {!! BootForm::text('Video Url', 'video_url')->placeholder('http://video.com') !!}
        {!! BootForm::text('Phone', 'phone')->placeholder('07986 543 364') !!}
        {!! BootForm::text('Email Address', 'email')->placeholder('example@domain.com') !!}
        {!! BootForm::submit('Save')->class("btn") !!}
    {!! BootForm::close() !!}

    </div>

</div>


@endsection