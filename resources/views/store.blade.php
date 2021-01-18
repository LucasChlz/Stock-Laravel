@extends('layouts.Template')

@section('title')
    Signin-Stock
@endsection


@section('css')
    <link rel="stylesheet" href="{{ asset('styles/global.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/login.css') }}">
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
                <h1>Sign Up</h1>
                <p>already have an account ? <colorTxt><a href="{{ route('login.page') }}">Login here!</a></colorTxt></p>
                <form action="{{ route('register.make') }}" method="POST">
                    @csrf
                    <div class="input-sec">
                        <label for="">Name</label>
                        <input type="text" name="name">
                    </div><!--input-sec-->

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