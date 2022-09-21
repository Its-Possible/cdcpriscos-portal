@extends('layouts.guest')

@section('content')
    <div class="row">
        <div class="col-md-6">
            teste
        </div>
        <div class="col-md-6 bg-dark">
            <div class="container">
                <div class="row">
                    <form method="post" action="{{ route('cdc.login') }}">
                        {{ csrf_field() }}
                        <input class="form-control" type="text" name="email" placeholder="Email" />
                        <input class="form-control" type="password" name="password" placeholder="Password" />
                        <button type="submit">Sign In</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
