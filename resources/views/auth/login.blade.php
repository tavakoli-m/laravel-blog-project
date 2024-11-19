@extends('auth.layouts.master')

@section('content')
<form class="pt-3 pb-1 px-2 bg-light rounded-bottom" action="{{ route('app.login') }}" method="POST">
    @csrf
    <section class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email" id="email" placeholder="email ...">
    </section>
    <section class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="password" id="password" placeholder="password ...">
    </section>
    <section class="mt-4 mb-2 d-flex justify-content-between">
        <input type="submit" class="btn btn-success btn-sm" value="login">
        <a class="" href="">register</a>
    </section>
</form>
@endsection