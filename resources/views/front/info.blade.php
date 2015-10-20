@extends('front')

@section('content')

<p>For portfolio requests and further information please contact:</p>

@if (strlen($settings->address))
<p>
	{!! nl2br($settings->address) !!}
</p>
@endif

@if (strlen($settings->phone))
<p>
	TEL: <a href="tel:{!! $settings->phone !!}">{!! $settings->phone !!}</a>
</p>
@endif

@if (strlen($settings->fax))
<p>
	FAX: <a href="tel:{!! $settings->phone !!}">{!! $settings->fax !!}</a>
</p>
@endif

@if (strlen($settings->email))
<p>
	{!! $cleanEmail	!!}
</p>
@endif

<p>
	<a href="http://www.clmuk.com" target="_blank">www.clmuk.com</a>
</p>


@endsection
