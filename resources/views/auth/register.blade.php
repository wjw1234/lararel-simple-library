@extends('admin')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <form role="form" method="POST" action="{!! url('/auth/register') !!}">
                {!! csrf_field() !!}
                <div class="form-group">
                    <input type="text" placeholder="name" name="name" value="{!! old('name') !!}">
                </div>
                <div class="form-group">
                    <input type="email" placeholder="email" name="email" value="{!! old('email') !!}">
                </div>
                <div class="form-group">
                    <input type="password" placeholder="password" name="password">
                </div>
                <div class="form-group">
                    <input type="password" placeholder="confirm password" name="password_confirmation">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Register</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection