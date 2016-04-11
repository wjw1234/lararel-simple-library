@extends('admin')

@section('content')
   
<div class="container">

    <div class="row">

        <div class="col-md-12">

            <h2>Settings</h2>

        </div>

    </div>

    {!! BootForm::open()->action(url('/dashboard/settings')) !!}
    {!! BootForm::bind($settings) !!}

    <div class="row">

        <div class="col-md-6">
            {!! BootForm::text('Title', 'site_title')->placeholder('John Smith') !!}
            {!! BootForm::text('Video Url', 'video_url')->placeholder('http://video.com') !!}
            {!! BootForm::text('Phone', 'phone')->placeholder('07986 543 364') !!}
            {!! BootForm::text('Fax', 'fax')->placeholder('07986 543 364') !!}
            {!! BootForm::text('Email Address', 'email')->placeholder('example@domain.com') !!}
        </div>
        <div class="col-md-6">
            {!! BootForm::text('Intstagram Link', 'instagram')->placeholder('http://instagram.com/jsmith') !!}
            {!! BootForm::text('Tumblr Link', 'tumblr')->placeholder('http://tumblr.com/j.smith') !!}
            {!! BootForm::textarea('Address', 'address')->placeholder('123 Address Street') !!}
        </div>

    </div>

    <div class="row">
        <div class="col-md-12">
            {!! BootForm::submit('Save')->class("btn btn-primary") !!}
        </div>
    </div>

    {!! BootForm::close() !!}

</div>


@endsection