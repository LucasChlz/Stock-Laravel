@extends('layouts.Template')

@section('title')
    Login-Stock
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('styles/login.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/global.css') }}">
@endsection

@section('content')
        <div class="sec-cont">
        <section class="caller">
            <div class="overlay">
                <div class="container">
                    <div class="text-caller">
                        <h1>WELCOME TO <br>STOCKETZ</h1>
                        <p>keep your products organized with <colorTxt>Stocketz<colorTxt></p>
                        <p></p>
                    </div><!--text-caller-->
                </div><!--container-->
            </div><!--overlay-->
        </section><!--caller-->
        <div class="clear"></div>
        </div>
        <section class="login">
            <div class="container">
                <div class="text-form">
                    {{\Session::get('error')}}
                    {{\Session::get('success')}}
                    <h1>Login</h1>
                    <p>Don’t have a account ? <colorTxt><a href="{{ route('register.page') }}">sign up free</a></colorTxt></p>
                    <form action="{{ route('login.make') }}" method="POST">
                        @csrf
                        <div class="input-sec">
                            <label for="">E-mail</label>
                            <input type="email" name="email">
                        </div><!--input-sec-->
    
                        <div class="input-sec">
                            <label for="">Password</label>
                            <input type="password" name="password">
                        </div><!--input-sec-->

                        <button type="submit">Login</button>
                    </form>
                </div><!--text-form-->
            </div><!--container-->
            <div class="clear"></div>
        </section><!--login-->
@endsection

    {{-- <section class="sec-content">
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
    </section> --}}
