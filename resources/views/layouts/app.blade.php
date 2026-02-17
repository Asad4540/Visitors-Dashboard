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

            {{-- Logo --}}
            <a href="/" style="border-bottom: solid 1px #fff">
                <img src="{{ asset('images/VM-White-Logo.png') }}" alt="VM Logo" class="vm-logo" style="width: 130px;">
            </a>

            {{-- Dashboard --}}
            <a href="{{ route('dashboard') }}"
                class="sidebar-link {{ request()->routeIs('dashboard') ? 'active-link' : '' }}">
                <i class="bi bi-columns-gap"></i> Dashboard
            </a>

            {{-- Visitors Management --}}
            <a href="{{ route('visitorsManagement') }}"
                class="sidebar-link {{ request()->routeIs('visitorsManagement') ? 'active-link' : '' }}">
                <i class="bi bi-people"></i> Visitors Management
            </a>

            {{-- Logout --}}
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="sidebar-link logout-btn">
                    <i class="bi bi-box-arrow-left"></i> Log out
                </button>
            </form>

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