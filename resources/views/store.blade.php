@extends('layouts.Template')

@section('css')
    <link rel="stylesheet" href="{{ asset('styles/login.css') }}">
@endsection

@section('navbar')
    <header>
        <div class="container">
            <img src="{{ asset('images/boxLogo1.png') }}" alt="">
            <div class="btn">
                <a href="#">Log In</a>
            </div><!--btn-->
        </div><!--container-->
    </header>
@endsection

@section('content')
    <section class="sec-content">
        <div class="container">
            <div class="sec-log">
                <div class="box-form">
                    {{\Session::get('error')}}
                    {{\Session::get('success')}}
                    <h2>Signin now!</h2>
                    <form action="{{ route('register.make') }}" method="POST">
                        @csrf
                        <label for="">Name</label>
                            <input type="text" name="name">
                        <label for="">E-mail</label>
                            <input type="text" name="email">
                        <label for="">Password</label>
                            <input type="text" name="password">
                        <button type="submit">Sign In</button>
                    </form>
                </div><!--box-form-->
            </div><!--sec-log-->
        </div><!--container-->
        <div class="bg-wave"></div><!--bg-wave-->
    </section>
@endsection