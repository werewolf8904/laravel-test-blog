@extends('layout')
@section('breadcrumbs_items')
    <li class="breadcrumb-item">
        <a href="{{route('posts-category.index')}}">@lang('Posts Categories')</a>
    </li>
    <li class="breadcrumb-item active" aria-current="page">{{$postsCategory->name}}</li>
@endsection
@section('content')
    <h1>
        {{$postsCategory->name}}
        <a href="{{route('posts-category.edit',$postsCategory->id)}}"
           class="btn btn-secondary">@lang('Edit')</a>
    </h1>
    <div class="text-content jumbotron">
        {{$postsCategory->description}}
    </div>
    <span class="h3">@lang('Posts')</span>
    <hr/>
    <div class="row posts">
        @foreach($posts as $post)
            @include('_partials.post-item')
        @endforeach
        {{$posts->links()}}
    </div>
    <hr/>
    <span class="comments__title">@lang('Comments')</span>
    @include('_partials.commentform')
    @include('_partials.comments')
@endsection
