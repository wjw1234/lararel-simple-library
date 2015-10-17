@extends('admin')

@section('content')

<div class="container">

    <div class="col-md-12">

    <h2>Images</h2>
   

    @if (count($images))
        <table class="image-table table table-striped">
            <thead>
                <tr>
                    {{--<th>Title</th>--}}
                    <th>File</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            @foreach ($images as $image)
                <tr>
                    {{--<td>{!! $image->title !!}</td>--}}
                    <td>{!! $image->file !!}</td>
                    <td><img src="{!! url('images/uploaded/' . $image->file) !!}" /></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <p>No images!</p>
    @endif

    <h2>Upload</h2>

    {!! BootForm::open()->enctype('multipart/form-data'); !!}
        {{--{!! BootForm::text('Name', 'title')->placeholder('image name') !!}--}}
        {!! BootForm::file('File', 'photo') !!}
        {!! BootForm::submit('Save')->class("btn") !!}
    {!! BootForm::close() !!}

    </div>

</div>

@endsection

