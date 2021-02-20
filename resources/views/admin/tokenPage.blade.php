@extends('layouts.Template')

@section('title')
    Create your token | {{ $userInfo->name }}  
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

             <a href="{{ route('admin.create') }}"><div class="icon-single">
                 <i class="fas fa-archive"></i>
                 <span>Create Products</span>
             </div></a>

             <a href="{{ route('token.page') }}"><div class="icon-single active">
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
        <h1>Token</h1>
    </div>
</section><!--container-content-->
@endsection

@section('js')
<script src="https://kit.fontawesome.com/f3bfbc9f38.js" crossorigin="anonymous"></script>
<script src="{{ asset('js/sideMenu.js') }}"></script> 
@endsection