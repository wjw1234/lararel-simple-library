@extends('admin')

@section('content')

<div class="container">
	<div class="col-md-12">
		<h1>{!! $currentbook->title !!}</h1>
	</div>
	<div class="col-md-6">
		<h2>Images</h2>
		@if (count($images))
			<ul id="images">
	        	@foreach ($images as $image)<li id="image-{!! $image->id !!}"><span style="background-image:url({!! asset('images/uploaded/'.$image->file) !!});"></span></li>@endforeach
	        </ul>
	    @else
	        <p>No images!</p>
	    @endif
    </div>
    <div class="col-md-6">
    	<h2>Slides<a href="#" id="addSlide" data-id="{!! $currentbook->id !!}">+</a></h2>
    	<ul id="slides">
    		@foreach ($currentbook->slides as $slide)
    			<li class="slide" id="slide-{!! $slide->id !!}"><span class="drag-handle">☰</span><ul id="slide-content-{!! $slide->id !!}"></ul><a href="#" class="remove-slide">Remove</a></li>
    		@endforeach
    	</ul>
    	<button id="saveLayout" class="btn btn-primary">Save</button>
    </div>
</div>
    

@endsection