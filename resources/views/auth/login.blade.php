@extends('admin')
@section('content')

<div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <form role="form" method="POST" action="{!! url('/auth/login') !!}">
                {!! csrf_field() !!}
                <div class="form-group">
                    <input type="email" name="email" placeholder="Email" class="form-control" value="{!! old('email') !!}">
                </div>
                <div class="form-group">
                    <input type="password" name="password" placeholder="Password" class="form-control">
                </div>
                <button type="submit" class="btn btn-success">Sign in</button>
            </form>
        </div>
    </div>
</div>
 
@endsection