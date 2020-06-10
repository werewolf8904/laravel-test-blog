<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{config('app.name')}}</title>

    <link href="{{ mix('css/app.css') }}" rel="stylesheet"/>
</head>
<body>
<header class="header">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{route('posts-category.index')}}">@lang('Categories')</a>
        <a class="navbar-brand" href="{{route('post.index')}}">@lang('Posts')</a>
    </nav>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('home')}}">@lang('Home')</a>
            </li>
            @yield('breadcrumbs_items')
        </ol>
    </nav>
</header>
<div class="container">
    @yield('content')
</div>
<footer class="footer">
    <div class="footer-info">
        <x-users-browsers-total></x-users-browsers-total>
    </div>
</footer>
<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
