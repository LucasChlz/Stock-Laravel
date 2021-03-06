@extends('layouts.Template')

@section('title')
    Welcome {{ $userInfo->name }}  
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('styles/admin/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/admin/create.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/login.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/global.css') }}">
@endsection

@section('content')
<section id="sideMenu" class="sideMenu">
       <div class="container-side">
            <div class="user-info">
                <span><i class="fas fa-address-book"></i></span>
                <p>{{ $userInfo->name }}</p>
                <p>{{ $userInfo->email }}</p>
            </div><!--user-info-->

            <div class="container-icons">
                <a href="{{ route('admin.dashboard') }}"><div class="icon-single">
                    <i class="fas fa-boxes"></i>
                    <span>Products</span>
                </div></a>                

                <a href="{{ route('admin.create') }}"><div class="icon-single active">
                    <i class="fas fa-archive"></i>
                    <span>Create Products</span>
                </div></a>

                <a href="{{ route('token.page') }}"><div class="icon-single">
                    <i class="fas fa-archive"></i>
                    <span>Token</span>
                </div></a>

                <a href="{{ route('logout') }}"><div class="icon-single">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </div></a>

            </div><!--container-icons-->
       </div><!--container-->
    </section><!--sideMenu-->
    
    <section id="content" class="container-content">
        <span class="side-btn" id="menuBtn" ><i class="fas fa-bars"></i></span>
        <span id="closeBtn" class="re-side"><i class="fas fa-caret-square-left"></i></span>
        <div class="container-call">
            <div style="padding: 20px 20px" class="text-form">
                <h2>Create new Product</h2>
                {{\Session::get('error')}}
                {{\Session::get('success')}}
                <form action="{{ route('admin.create.make') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="input-sec">
                        <label for="">Name</label>
                        <input type="text" name="name">
                    </div><!--input-sec-->

                    <div class="input-sec">
                        <label for="">Amount</label>
                        <input type="number" min="0" name="amount">
                    </div><!--input-sec-->

                    <div class="input-sec">
                        <label for="">Price</label>
                        <input type="number" min="0" max="90000000.00" step="0.01" name="price">
                    </div><!--input-sec-->

                    <div class="input-sec">
                        <label for="">Image</label>
                        <input type="file" name="image">
                    </div><!--input-sec-->

                    <button type="submit">Create</button>
                </form>
            </div><!--text-form-->
        </div>
    </section><!--container-content-->
@endsection

@section('js')
<script src="https://kit.fontawesome.com/f3bfbc9f38.js" crossorigin="anonymous"></script>
<script src="{{ asset('js/sideMenu.js') }}"></script> 
@endsection