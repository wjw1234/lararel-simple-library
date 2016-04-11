@extends('admin')

@section('content')

<div class="container">
	<div class="col-md-12">
		<h2>Set Album Order</h2>
	</div>
	<div class="col-md-12">
		<ul id="albums-order">
    		@foreach ($albums as $album)
    			<li class="album" id="album-{!! $album->id !!}">
    				<span class="drag-handle">☰</span>
    				<ul class="images-draggable" id="album-content-{!! $album->id !!}">
    					@foreach ($album->Photos as $image)
    						<li id="image-{!! $image->id !!}"><span style="background-image:url(/albums/{!! $image->image !!});"></span></li>
    					@endforeach
    				</ul>
    			</li>
    		@endforeach
    	</ul>
	</div>
@endsection