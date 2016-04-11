@extends('admin')

@section('content')
   
<div class="container">

    <div class="col-md-12">

    <h2>Create a slideshow</h2>

    {!! BootForm::open()->action(url('/dashboard/book')) !!}
        <div class="container">

            <div class="col-md-12">
                {!! BootForm::text('Title', 'title')->placeholder('John Smith') !!}
                {!! BootForm::submit('Save')->class("btn btn-primary") !!}
            </div>
        </div>
    {!! BootForm::close() !!}

    @if (count($books))
        <h2>Slideshows</h2>
        <ul>
            @foreach ($books as $book)
                <li>{!! $book->title !!} <a href="/dashboard/bookDelete/{!! $book->id !!}">[delete]</a></li>
            @endforeach
        </ul>
    @endif

    </div>

</div>


@endsection