<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, viewport-fit=cover">
	<meta name="description" content="">
	<link rel="stylesheet" type="text/css" href="/css/main.css">
	<title>Jarvis</title>
	<meta name="csrf-token" content="{{csrf_token()}}">
	<link rel="apple-touch-icon" href="/images/favicons/apple-icon.png">
	<link rel="apple-touch-icon" sizes="57x57" href="/images/favicons/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="/images/favicons/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="/images/favicons/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="/images/favicons/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="/images/favicons/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="/images/favicons/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="/images/favicons/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="/images/favicons/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="/images/favicons/apple-icon-180x180.png">
	<link rel="apple-touch-icon-precomposed" href="/images/favicons/apple-icon-precomposed.png">
	<link rel="icon" href="/images/favicons/favicon.ico"/>
	<link rel="icon" type="image/png" sizes="36x36" href="/images/favicons/android-icon-36x36.png">
	<link rel="icon" type="image/png" sizes="48x48" href="/images/favicons/android-icon-48x48.png">
	<link rel="icon" type="image/png" sizes="72x72" href="/images/favicons/android-icon-72x72.png">
	<link rel="icon" type="image/png" sizes="96x96" href="/images/favicons/android-icon-96x96.png">
	<link rel="icon" type="image/png" sizes="144x144" href="/images/favicons/android-icon-144x144.png">
	<link rel="icon" type="image/png" sizes="192x192" href="/images/favicons/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/images/favicons/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="/images/favicons/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/images/favicons/favicon-16x16.png">
</head>
<body>


<header>
	<a href="{{ route('welcome') }}"><h1>Jarvis</h1></a>
    

     @auth
      	<a class="menu" href="{{ route('dashboard') }}">List ({{$todo}})<a>
      	<a class="menu" href="{{ route('dashboard') }}">Out ({{$out}}) <small>{{number_format($out_1,0)}} / {{number_format($out_2,0)}}</small><a>
      	<a class="menu" href="{{ route('dashboard') }}">In ({{$in}}) <small>{{number_format($in_1,0)}} / {{number_format($in_2,0)}}</small><a>
      	<a class="menu" href="{{ route('dashboard') }}">Projects ({{$projects}})<a>
      	<a class="menu" href="{{ route('dashboard') }}">Wishes ({{$wishes}})<a>
      	<a class="menu" href="{{ route('dashboard') }}">Codex ({{$codex}})<a>
      	<a class="menu" href="{{ route('dashboard') }}">Done ({{$done}})<a>
      	<!-- <a class="menu" href="{ { route('dashboard') } }">Markers(1-100 priority)</a> -->
      	<a class="menu" href="{{ route('profile') }}">Profile</a>
      	<a class="menu" href="{{ route('logout') }}">Log Out</a>       
     @endauth




    
    <!-- <form method="post" action="{ { route('logout') } }" class="flex">
        @ csrf
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">Log Out</a>
    </form> -->
</header>
<main>