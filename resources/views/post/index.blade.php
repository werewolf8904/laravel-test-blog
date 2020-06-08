@extends('layout')
@section('content')
    <div class="row">
        <div class="col-2 p-2">
            <a href="{{route('post.create')}}"  class="btn btn-primary">@lang('Create new post')</a>
        </div>
    </div>
    <div class="row posts">
        @foreach($posts as $post)
           @include('_partials.post-item')
        @endforeach

    </div>
    {{$posts->links()}}
@endsection

