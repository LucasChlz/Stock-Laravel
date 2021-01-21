@extends('layouts.Template')

@section('title')
    Welcome {{ $userInfo->name }}  
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('styles/admin/dashboard.css') }}">
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
                <a href="{{ route('admin.dashboard') }}"><div class="icon-single active">
                    <i class="fas fa-boxes"></i>
                    <span>Products</span>
                </div></a>                

                <a href="{{ route('admin.create') }}"><div class="icon-single">
                    <i class="fas fa-archive"></i>
                    <span>Create Products</span>
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

        <div class="container-products">
            
            @foreach ($Products as $product)    
                <div class="single-product   @if ($Products->count() === 2)
                    flex-1
                @endif">
                    <h1>{{ $product->name }}</h1>
                    <div class="image-product">
                        <img src="{{ asset("storage/products/{$product->fileName}") }}" alt="">
                    </div><!--img-->

                    <div class="info-product">
                        <p>Price: {{ $product->price}}</p>
                        <form action="{{ route('admin.amount.update') }}" method="post">
                        @csrf
                        @method('put')
                            <p class="amountPut">Amount
                                <input type="number" min="0" name="amount" value="{{ $product->amount}}">
                                <input type="hidden" name="id" value="{{ $product->id }}">
                                <button>Update</button>
                            </p>
                        </form>
                        <p>Created At: {{ $product->created_at }}</p>
                   </div><!--info-product-->

                </div><!--single--product-->
            @endforeach
            
        </div><!--container-products-->

    </section><!--container-content-->
@endsection

@section('js')
<script src="https://kit.fontawesome.com/f3bfbc9f38.js" crossorigin="anonymous"></script>
<script src="{{ asset('js/sideMenu.js') }}"></script> 
@endsection