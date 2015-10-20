@extends('front')

@section('content')

<div id="myCarousel" class="carousel slide" data-ride="carousel">

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
  	<?php $i = 0; ?>
  	@foreach ($currentbook->slides as $slide)	
  		<div class="item {!! !$i ? 'active' : null !!}">
        	@foreach ($slide->images as $image)
            	<img src="{!! url('/images/uploaded/'.$image->file->file) !!}" />
        	@endforeach
        </div>
        <?php $i++; ?>
    @endforeach

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

@endsection
