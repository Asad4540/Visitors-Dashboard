<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>

    </style>
</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <div>
            <a href="/" style="border-bottom : solid 1px #fff">
                <img src="{{ asset('images/VM-White-Logo.png') }}" alt="VM Logo" class="vm-logo" style="width: 130px;">
            </a>
            <a href="{{ route('dashboard') }}" style="margin-top:15px"><i class="bi bi-columns-gap"></i> Dashboard</a>
            <a href="{{ route('visitorsManagement') }}" style="margin-top:5px"><i class="bi bi-people"></i> Visitors
                Management</a>
            <!-- <a href="#" style="margin-top:5px"><i class="bi bi-box-arrow-left"></i> Log out</a> -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    style="background:none; border:none; color:white; margin-top:15px; padding-left:20px">
                    <i class="bi bi-box-arrow-left"></i> Log out
                </button>
            </form>
        </div>
        <div style="margin-bottom:20px">
            @php
                $currentYear = date('Y');
            @endphp
            <span class="footer-note" style="padding:0 10px">© {{$currentYear}} VM Visitors</span> <br>
            <span class="footer-subnote" style="padding:0 10px">All Rights Reserved</span>
        </div>
    </div>

    <!-- Navbar -->
    <div class="navbar">
        Welcome,&nbsp; <b>{{ Auth::user()->name ?? 'User' }}</b>

        <form method="POST" action="{{ route('logout') }}" style="display:inline;">
            @csrf
            <!-- <button type="submit" style="margin-left:15px;">Logout</button> -->
        </form>

        <img src="{{ asset('images/profile.png') }}" alt="" style="width: 50px;">
    </div>

    <!-- Main Content -->
    <div class="content">
        {{ $slot }}
    </div>

</body>

</html>