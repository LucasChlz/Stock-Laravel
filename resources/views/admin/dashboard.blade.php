@extends('layouts.Template')

@section('title')
    Welcome {{ $userInfo->name }}  
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('styles/admin/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/global.css') }}">
@endsection


@section('js')
<script src="https://kit.fontawesome.com/f3bfbc9f38.js" crossorigin="anonymous"></script>
{{-- <script src="{{ asset('js/sideMenu.js') }}"></script> --}}
@endsection