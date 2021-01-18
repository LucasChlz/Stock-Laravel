@extends('layouts.Template')

@section('css')
    <link rel="stylesheet" href="{{ asset('styles/login.css') }}">
@endsection

@section('navbar')
    <header>
        <div class="container">
            <img src="{{ asset('images/boxLogo1.png') }}" alt="">
            <div class="btn">
                <a href="{{ route('register.page') }}">Sign In</a>
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
                    <h2>Log into your account</h2>
                    <form action="{{ route('login.make') }}" method="POST">
                        @csrf
                        <label for="">E-mail</label>
                            <input type="email" name="email">
                        <label for="">Password</label>
                            <input type="password" name="password">
                        <button type="submit">Log In</button>
                    </form>
                </div><!--box-form-->
            </div><!--sec-log-->
        </div><!--container-->
        <div class="bg-wave"></div><!--bg-wave-->
    </section>
@endsection